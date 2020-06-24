<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
     protected $fillable = [
        'merchant_surname','email', 'phonenumber'
      ];
      protected $primaryKey = 'agent_id';
}
