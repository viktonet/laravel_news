<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class NewsCategory extends Model
{
  protected $fillable = ['title', 'slug', 'parent_id', 'description'];
  
  public function parentCategory ()
  {
    return $this->belongsTo(NewsCategory::class, 'parent_id','id');
  }
/* Аксесори
  public function getTitleAttribute($valueFromObject)
  {
    return mb_strtoupper($valueFromObject);
  }
//Мутатор
  public function setTitleAttribute($incomingValue)
  {
    $this->attributes['title'] = mb_strtolower($incomingValue);
  }
  */
}
