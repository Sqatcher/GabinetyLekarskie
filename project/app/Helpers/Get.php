<?php

namespace App\Helpers;

use App\Models\Facility;
use App\Models\Role;

trait Get
{
    public function getRole(int $id): Role
    {
        $role = Role::find($id);
        if($role == null) {
            abort(500);
        }
        return $role;
    }

    public function getFacility(int $id): Facility
    {
        $facility = Facility::find($id);
        if($facility == null) {
            abort(500);
        }
        return $facility;
    }
}
