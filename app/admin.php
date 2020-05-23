<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    /*
     * The table associated with the model.*/
    protected $table = 'profile';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    /*protected $connection = 'connection-name';

    protected $attributes = [
        'delayed' => false,
    ];

    $profile = App\profile::all();
    foreach ($profile as $profile) {
    echo $profile->name;*/
}
