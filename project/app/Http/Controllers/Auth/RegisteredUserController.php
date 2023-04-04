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

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'role' => [ 'required' ],
            'email' => ['required', 'string', 'max:255', 'unique:'.User::class, 'regex:/^.+@.+$/'],#Rule::unique('users', 'email')
            //'nickname' => ['required', 'string',  'max:255', 'unique:'.User::class],
            //'password' => ['required',
             //   'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*])(?=.{8,})/'],//Rules\Password::defaults()],
            //'repeat_password' => ['required', 'same:password'],
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
        $user->save();
        //cos takiego msuze dodac jak chce przejsc do innej strony przy regulaminie
        //Route::get('/home', [HomeController::class, 'index'])->name('home');

        //event(new Registered($user));

        //Auth::login($user);
        return Redirect::to('/');
    }
}
