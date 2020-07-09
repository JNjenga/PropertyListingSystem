<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() {
        //a role can have many users
       return $this->belongsToMany('App\User');
    }
}
