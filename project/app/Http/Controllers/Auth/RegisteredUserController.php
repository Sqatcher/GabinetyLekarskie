<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FilterHelper;
use App\Helpers\PESELRule;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Validation\Validator;

class RegisteredUserController extends Controller
{
    use FilterHelper;

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function allusers(): View
    {
        session(["user_filter_search" => '%']);
        // Uncomment if needed
        /*
        session(["user_filter_facility" => "all",
            "user_filter_role" => "all",
            "user_filter_search" => "%"]);
        */

        $facilities = array();
        $raw_facilities  = User::select('facility')->groupBy('facility')->get();
        foreach ($raw_facilities as $facility) {
            $facilities[] = $facility->facility;
        }
        $facilities = array_unique($facilities);


        $roles = array();
        $raw_roles  = User::select('role')->groupBy('role')->get();
        foreach ($raw_roles as $role) {
            $roles[] = $role->role;
        }
        $roles = array_unique($roles);

        return view('auth.allusers')
            ->with('users', $this->filter(new Request()))
            ->with('facilities', $facilities)
            ->with('roles', $roles);
        //return view('auth.allusers')->with('users', User::all());
    }

    public function filter(Request $request): Response
    {
        $request->validate([
            'filter_facility' => ['string'],
            'filter_role' => ['string'],
            'filter_search' => ['string'],
        ]);

        $type = 'user';
        return $this->filterProcedure($request, $type);
    }

    public function schedules(): View
    {
        $roomSchedules = \App\Models\Schedule::where('owner_type', 2)->get();
        $userSchedules = \App\Models\Schedule::where('owner_type', 1)->get();

        return view('dashboardAdmin')->with('roomSchedules', $roomSchedules)->with('userSchedules', $userSchedules);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if ($this->ensureIsNotNullUser(Auth::user())->role == 1) {
            $request->validate([
                'name' => ['required'],
                'surname' => ['required'],
                'role' => [ 'required' ],
                'facility' => ['required'],
                'email' => ['required', 'string', 'max:255', 'unique:'.User::class, 'regex:/^.+@.+$/'],#Rule::unique('users', 'email')
                'password' => ['required',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*])(?=.{8,})/'],//Rules\Password::defaults()],
                'repeat_password' => ['required', 'same:password']
            ]);
        } else {
            $request->validate([
                'name' => ['required'],
                'surname' => ['required'],
                'role' => [ 'required' ],
                'email' => ['required', 'string', 'max:255', 'unique:'.User::class, 'regex:/^.+@.+$/'],#Rule::unique('users', 'email')
                'password' => ['required',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*])(?=.{8,})/'],//Rules\Password::defaults()],
                'repeat_password' => ['required', 'same:password']
            ]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email =  $request->email;
        $user->password =  Hash::make(strval($request['password']));
        $user->role = $request->role;
        if (Auth::user()->role == 1) {
            $user->facility = $request->facility;
        } else {
            $user->facility = Auth::user()->facility;
        }

        $user->save();

        return Redirect::to('/allusers');
    }

    public function edituser(int $id): View|RedirectResponse
    {
        $user = $this->ensureIsNotNullUser(User::find($id));
        if ($user->role == 1) {
            return Redirect::to('/');
        }
        if ($this->ensureIsNotNullUser(Auth::user())->role == 2 and ($user->facility != $this->ensureIsNotNullUser(Auth::user())->facility or $user->role == 2)) {
            return Redirect::to('/');
        }

        return view('auth.edituser')->with('user', $user);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        if (Auth::user()->role == 1) {
            $request->validate([
                'name' => ['required'],
                'surname' => ['required'],
                'role' => ['required'],
                'facility' => ['required'],
            ]);
        } else {
            $request->validate([
                'name' => ['required'],
                'surname' => ['required'],
                'role' => ['required'],
            ]);
        }

        $user = User::find($id);
        if ($user != null) {
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->role = $request->role;
            if (Auth::user()->role == 1) {
                $user->facility = $request->facility;
            }
            $user->save();
        }
        return Redirect::to('/allusers');
    }

    public function delete(Request $request, int $id): RedirectResponse
    {
        $user = User::find($id);
        if ($user!= null) {
            $user->delete();
        }
        return Redirect::to('/allusers');
    }
}
