<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function roleuser(){
        return $this->belongsTo('App\Models\RoleUser','Role_id');
    }
}
