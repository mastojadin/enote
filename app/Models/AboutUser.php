<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUser extends Model
{
    protected $table = "about_user";

    public function getUsers()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
