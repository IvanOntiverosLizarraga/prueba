<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'description', 'concept', 'amount',
    ];

    public function account(){
    	return $this->belongsTo('App\Account');
    }
}
