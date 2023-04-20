<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'aktualne_hasło' => ['required', 'current_password'],
            'hasło' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
            'powtórz_hasło' => ['required', 'same:hasło'],
        ]);

        if ($request->user()) {
            $request->user()->update([
                'password' => Hash::make($validated['hasło']),
            ]);
        }

        return back()->with('status', 'password-updated');
    }
}
