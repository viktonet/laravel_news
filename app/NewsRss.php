<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsRss extends Model
{
    protected $fillable = ['name', 'user_id', 'email','is_active'];
}
