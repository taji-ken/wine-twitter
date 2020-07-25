<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['content', 'user_id', 'type', 'taste'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
