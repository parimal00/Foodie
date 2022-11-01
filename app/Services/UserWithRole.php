<?php

namespace App\Services;

use App\Models\User;
use TCG\Voyager\Models\Role;

class UserWithRole
{
    private $role;
    function __construct($role)
    {
        $this->role = $role;
    }

    public function get()
    {
        $role_id = Role::where('display_name', $this->role)->first()->id;
        $drivers = User::where('role_id', $role_id)->get();
        return $drivers;
    }
}
