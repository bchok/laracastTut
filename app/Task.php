<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = array();
    public function scopeIncomplete($query){
        return $query->where('complete', 0)->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
    public function addComment($body, $user_id) {
        $this->comments()->Create(compact('body', 'user_id'));
    }
}
