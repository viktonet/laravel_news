<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
  protected $fillable = ['title', 'slug', 'parent_id', 'description'];
}
