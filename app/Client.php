<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // set relationship for client and wallets
    public function wallet()
    {
    	return $this->hasMany('App\Wallet');
    }
}
