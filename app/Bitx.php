<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitx extends Model
{
    // create a quick bit
    protected $url;


    // instance
    public function __construct()
    {
    	$this->url = '';
    }
}
