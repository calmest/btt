<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    // relate client
    public function client()
    {
    	return $this->hasOne('App\Client');
    }
}
