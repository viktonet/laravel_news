<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'content_raw', 'category_id','is_published'];
    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
