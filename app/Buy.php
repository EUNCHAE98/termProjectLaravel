<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
	protected $increment = false;
    public $timestamps = false;

    public function board(){
    	return $this->belongsTo('App\board', 'board_id', 'num');
    }
}
