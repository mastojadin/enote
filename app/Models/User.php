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
}
