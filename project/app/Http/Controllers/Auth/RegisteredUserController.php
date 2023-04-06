<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\PESELRule;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function allusers(): View
    {
        return view('auth.allusers')->with('users', User::all());
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'role' => [ 'required' ],
            'facility' => ['required'],
            'email' => ['required', 'string', 'max:255', 'unique:'.User::class, 'regex:/^.+@.+$/'],#Rule::unique('users', 'email')
            //'nickname' => ['required', 'string',  'max:255', 'unique:'.User::class],
            'password' => ['required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*])(?=.{8,})/'],//Rules\Password::defaults()],
            'repeat_password' => ['required', 'same:password']
        ]);

/*
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make(strval($request['password'])),
            'role' => 1

        ]);
*/
        $user = new User();
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

        $user = User::find($id);
        if ($user != null) {
            $user->email = $request->email;
            $user->role = $request->role;
            $user->facility = $request->facility;
            $user->save();
        }

        return Redirect::to('/');
    }
}
