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

 Auth::routes(['verify' => true]);


//Route::get('/user', 'HomeController@index')->name('user');
$methods = ['index', 'edit', 'update'];
Route::resource('/user', 'User\UserController')->only($methods)->names('user')->middleware('verified');

Route::resource('/user/all', 'User\AllUsersController')
-> names('user.all')->middleware('verified');


Route::prefix('user')->middleware('verified')->group(function(){
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



//Работа с коментарями к новостям
  Route::resource('news/comments', 'News\CommentsController') ->only(['index','store'])->names('news.comments');
//Работа с новостями
    Route::resource('news', 'News\PostController') ->only(['index','show'])->names('news');
  //Категории статей
  Route::resource('news/category', 'News\CategoryController') ->only(['index','show'])->names('category');

//Подписка на новости
  Route::resource('rss', 'News\NewsRssController') ->only(['index','store','destroy'])->names('rss');
