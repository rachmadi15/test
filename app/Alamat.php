<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $fillable = [
    	'alamat', 'customer_id'
    ];
}
