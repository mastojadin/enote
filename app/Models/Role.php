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

    public function scopeGetAllRoles($query, $role_id)
    {
        return $query->where('id', '>=', $role_id);
    }
}
