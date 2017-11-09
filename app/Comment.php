<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded = array();
    function post() {

        return $this->belongsTo(task::class);
    }
}
