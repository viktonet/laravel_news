<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Админка сайта Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//Вивод новостей
Route::group(['namespace' => 'News', 'prefix' => 'news'], function(){
  Route::resource('posts', 'PostController') -> names('news.post');
});
//Админка пользователя новостей
$groupData = [
  'namespace' => 'News\Admin',
  'prefix' => 'user/news',
];

Route::group($groupData, function(){
  $methods = ['index', 'edit', 'update', 'create', 'store'];
  Route::resource('category', 'CategoryController')
  -> only($methods)
  -> names('news.admin.category');
});
//Route::resource('news', 'NewsController')->names('NewsAdmin');
