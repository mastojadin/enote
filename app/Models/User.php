<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

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

    public function scopeGetAllUsers($query, $role_id, $search_role, $search_name)
    {
        $to_return = $query->with(['getRole', 'getAboutUser'])->where('role_id', '>=', $role_id);

        if ($search_role) {
            $search_role_id = Role::where('role', '=', $search_role)->first();
            $to_return->where('role_id', '=', $search_role_id->id);
        }

        if ($search_name) {
            $to_return->where('name', 'LIKE', '%' . $search_name . '%');
        }

        return $to_return;
    }
}
