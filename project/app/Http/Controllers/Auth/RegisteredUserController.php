<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FilterHelper;
use App\Helpers\PESELRule;
use App\Helpers\Get;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Validation\Validator;

class RegisteredUserController extends Controller
{
    use FilterHelper;
    use Get;

    /**
     * Display the registration view.
     */
    public function create(): View|RedirectResponse
    {
        $user_role = $this->getRole($this->ensureIsNotNullUser(Auth::user())->role);

        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 6)) {
            return Redirect::to('/');
        }

        $roles = Role::get();
        $facilities = Facility::get();

        return view('auth.register')->with('user_role', $user_role)->with('roles', $roles)->with('facilities', $facilities);
    }

    public function allusers(): View|RedirectResponse
    {
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users) & 1) {
            return Redirect::to('/');
        }

        session(["user_filter_search" => '%']);
        // Uncomment if needed
        /*
        session(["user_filter_facility" => "all",
            "user_filter_role" => "all",
            "user_filter_search" => "%"]);
        */

        $facilities = array();
        $raw_users  = User::select('facility')->groupBy('facility')->get();
        foreach ($raw_users as $user) {
            $facilities[] = $this->getFacility($user->facility);
        }
        $facilities = array_unique($facilities);


        $user_role = $this->getRole($this->ensureIsNotNullUser(Auth::user())->role);

        $roles = array();
        $raw_users  = User::select('role')->groupBy('role')->get();
        foreach ($raw_users as $user) {
            if ($this->getRole($user->role)->users & 2) {
                continue;
            }
            if ($user_role->users & 4 and $this->getRole($user->role)->users & 4) {
                continue;
            }

            $roles[] = $this->getRole($user->role);
        }
        $roles = array_unique($roles);

        $request = new Request();
        $request->button = 1;
        return view('auth.allusers')
            ->with('users', $this->filter($request))
            ->with('facilities', $facilities)
            ->with('roles', $roles)
            ->with('user_role', $user_role);
    }

    public function filter(Request $request): Response|RedirectResponse
    {
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 1)) {
            return Redirect::to('/');
        }

        $request->validate([
            'filter_facility' => ['string'],
            'filter_role' => ['string'],
            'filter_search' => ['string'],
            'button' => ['int']
        ]);
        if ($request->button == 1) {
            $returnType = 'button';
        } else {
            $returnType = NULL;
        }
        $type = 'user';
        return $this->filterProcedure($request, $type, $returnType);
    }

    public function schedules(): View|RedirectResponse
    {
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->schedules) & 1) {
            return Redirect::to('/');
        }

        /* To do: role management */
        $roomSchedules = \App\Models\Schedule::where('owner_type', 2)->get();
        $userSchedules = \App\Models\Schedule::where('owner_type', 1)->get();

        return view('schedules')->with('roomSchedules', $roomSchedules)->with('userSchedules', $userSchedules);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 6)) {
            return Redirect::to('/');
        }

        if ($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 2) {
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
        if ($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 2) {
            $user->facility = $request->facility;
        } else {
            $user->facility = $this->ensureIsNotNullUser(Auth::user())->facility;
        }

        $user->save();

        return Redirect::to('/allusers');
    }

    public function edituser(int $id): View|RedirectResponse
    {
        $user_role = $this->getRole($this->ensureIsNotNullUser(Auth::user())->role);

        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 24)) {
            return Redirect::to('/');
        }

        $user = $this->ensureIsNotNullUser(User::find($id));
        $roles = Role::get();
        $facilities = Facility::get();

        if ($this->getRole($user->role)->users & 8) {
            return Redirect::to('/');
        }
        if ($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 16 and
            ($user->facility != $this->ensureIsNotNullUser(Auth::user())->facility or $this->getRole($user->role)->users & 16)) {
            return Redirect::to('/');
        }

        return view('auth.edituser')->with('user', $user)->with('user_role', $user_role)->with('roles', $roles)
            ->with('facilities', $facilities);
    }

    public function scheduleuser(int $id): View|RedirectResponse
    {
        $user_role = $this->getRole($this->ensureIsNotNullUser(Auth::user())->role);

        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 24)) {
            return Redirect::to('/');
        }

        $user = $this->ensureIsNotNullUser(User::find($id));

        $userSchedules = \App\Models\Schedule::where('schedule_owner', 'like', "k".$user->id."%")->get();
        return view('auth.scheduleuser')->with('userSchedules', $userSchedules)->with('userName', $user->name)
            ->with('userSurname', $user->surname);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 24)) {
            return Redirect::to('/');
        }

        if ($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 8) {
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
            if ($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 8) {
                $user->facility = $request->facility;
            }
            $user->save();
        }
        return Redirect::to('/allusers');
    }

    public function delete(Request $request, int $id): RedirectResponse
    {
        if (!($this->getRole($this->ensureIsNotNullUser(Auth::user())->role)->users & 24)) {
            return Redirect::to('/');
        }

        $user = User::find($id);
        if ($user!= null) {
            $user->delete();
        }
        return Redirect::to('/allusers');
    }
}
