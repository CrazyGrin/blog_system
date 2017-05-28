<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('now', function () {
    return date("Y-m-d H:i:s");
});

Route::auth();

Route::get('/', 'HomeController@index');

Route::group(['middleware' =>
'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
});

// Route::post('/commentModule/user/signin',function(){
// 	echo "User Sign";
// });

// Route::post('/commentModule/user/login',function(){
// 	echo "User Login";
// });

// Route::post('/commentModule/user/logout',function(){
// 	echo "User Logout";
// });





// Route::get('/' ,'commentModule\commentController@showAllComment');

// Route::get('/commentModule/comment/show',function(){
// });	

// Route::post('/commentModule/comment/creat',function(){
// 	echo "Comment Creat";
// });

// Route::post('/commentModule/comment/delete',function(){
// 	echo "Comment Delete";
// });

// Route::get('showallstu/{classNum}' , 'StuInfo\MainController@showAllStu');

// Route::get('showstuinfo/{stuNum}' , 'StuInfo\MainController@showStuInfo');

// Route::get('insert' , 'StuInfo\MainController@getInfo');

// Route::get('search/{key}' , 'StuInfo\MainController@search');