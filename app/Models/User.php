<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    public function getAboutUser()
    {
        return $this->hasOne('App\Models\AboutUser', 'user_id', 'id');
    }

    public function getRole()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function scopeGetAllUsers($query, $role_id)
    {
        return $query->with(['getRole', 'getAboutUser'])->where('id', '>=', $role_id);
    }
}
