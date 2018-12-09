<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class board extends Model
{
    protected $primaryKey = 'num';

    public function buys(){
    	return $this->hasMany('App\Buy', 'board_id', 'num');
    }
}
