<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'bank', 'account', 'credit', 
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function movements(){
    	return $this->hasMany('App\Movement');
    }
}
