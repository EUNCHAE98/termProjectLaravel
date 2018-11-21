<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'c_id';
    public $timestamps = false;
    // const CREATED_AT = 'c_regtime';
}
