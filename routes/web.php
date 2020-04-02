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

//Route::get('/user', 'HomeController@index')->name('user');
$methods = ['index', 'edit', 'update', ];
Route::resource('/user', 'User\UserController')->only($methods)->names('user');

Route::prefix('user')->group(function(){
  $groupData = [
    'namespace' => 'News\Admin',
    'prefix' => 'news',
  ];


  Route::group($groupData, function(){
    $methods = ['index', 'edit', 'update', 'create', 'store', ];
    Route::resource('category', 'CategoryController')
    -> only($methods)
    -> names('news.admin.category');

    Route::resource('posts', 'PostController')
    -> names('news.admin.posts');
  });
});
//Админка сайта Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


  Route::resource('news/comments', 'News\CommentsController') ->only(['index','store'])->names('news.comments');

    Route::resource('news', 'News\PostController') ->only(['index','show'])->names('news');

  Route::resource('news/category', 'News\CategoryController') ->only(['index','show'])->names('category');

//Админка пользователя новостей






//Route::resource('news', 'NewsController')->names('NewsAdmin');
