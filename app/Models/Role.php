<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    public function getUsers()
    {
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }
}
