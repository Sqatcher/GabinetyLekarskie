<?php

namespace App\Http\Controllers;

use App\Helpers\HasEnsure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RoleController extends Controller
{
    use HasEnsure;

    public function show(): RedirectResponse|View
    {
        if ($this->ensureIsNotNullUser(Auth::user())->role != 1) {
            return Redirect::to('/');
        }
        $roles = Role::where("id", "<>", 1)->get();

        return view('auth.roles')
            ->with('roles', $roles);
    }
}
