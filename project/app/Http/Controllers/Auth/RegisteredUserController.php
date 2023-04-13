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

        return view('auth.allusers')->with('users', $this->filter(new Request()))->with('facilities', $facilities)
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
        /*
                $validator = Validator::make($request->all(), [
                    'name' => ['required'],
                    'email' => ['required', 'email', 'unique:users'],
                    'password' => ['required', 'min:8', 'confirmed'],
                ]);

                $validator->messages()->add('email.unique', 'This email address is already in use.');

                if ($validator->fails()) {
                    return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
                }
        */
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email =  $request->email;
        $user->password =  Hash::make(strval($request['password']));
        $user->role = $request->role;
        $user->facility = $request->facility;
        $user->save();

        return Redirect::to('/');
    }

    public function edituser(int $id): View
    {
        $user = User::find($id);
        return view('auth.edituser')->with('user', $user);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'role' => [ 'required' ],
            'facility' => ['required'],
        ]);

        $user = User::find($id);
        if ($user != null) {
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->facility = $request->facility;
            $user->save();
        }

        return Redirect::to('/');
    }
}
