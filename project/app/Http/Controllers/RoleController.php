<?php

namespace App\Http\Controllers;

use App\Helpers\HasEnsure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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

    public function update(Request $request): RedirectResponse
    {
        if ($this->ensureIsNotNullUser(Auth::user())->role != 1) {
            return Redirect::to('/');
        }

        $request->validate([
            'current_password' => ['required', 'current_password'],
        ]);

        $roles = Role::where("id", "<>", 1)->get();

        foreach ($roles as $role) {
            $sum_user = 0;

            $sum_user += $request->{"see_user$role->id"} ?? 0;
            $sum_user += $request->{"create_user$role->id"} ?? 0;
            $sum_user += $request->{"create_facility_user$role->id"} ?? 0;
            $sum_user += $request->{"edit_user$role->id"} ?? 0;
            $sum_user += $request->{"edit_facility_user$role->id"} ?? 0;

            $sum_schedules = 0;
            $sum_schedules += $request->{"see_schedules$role->id"} ?? 0;
            $sum_schedules += $request->{"create_schedules$role->id"} ?? 0;
            $sum_schedules += $request->{"create_facility_schedules$role->id"} ?? 0;
            $sum_schedules += $request->{"edit_schedules$role->id"} ?? 0;
            $sum_schedules += $request->{"edit_facility_schedules$role->id"} ?? 0;

            $sum_storage = 0;
            $sum_storage += $request->{"see_facility_storage$role->id"} ?? 0;
            $sum_storage += $request->{"see_storage$role->id"} ?? 0;
            $sum_storage += $request->{"edit_facility_storage$role->id"} ?? 0;
            $sum_storage += $request->{"edit_storage$role->id"} ?? 0;

            $role_update = Role::find($role->id);
            if ($role_update == null) {
                abort(500);
            }
            $role_update->users = $sum_user;
            $role_update->schedules = $sum_schedules;
            $role_update->storage = $sum_storage;
            $role_update->save();
        }
        return Redirect::to('/roles');
    }
}
