<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    protected $fillable = ['text', 'news_id', 'parent_id','user_id', 'is_published'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
