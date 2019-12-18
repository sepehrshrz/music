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
    
    return view('admin\dashboard');
});
//Route::group(['namespace'=>'panell'],function (){
//Route::apiResource('/artist','ArtistController');
//});
Route::group(['namespace' => 'panell\artist' ] , function (){
	Route::post('/artist/{id}/restore','ArtistController@restore');
	Route::get('/artist/list','ArtistController@list');
	Route::apiResource('/artist','ArtistController');
});
Route::group(['namespace'=>'frontend'],function (){
	Route::get('/song/{id}','SongController@show');
}
);
Route::group(['namespace' => 'Auth'] , function (){
	Route::post('/login','LoginController@login');
	Route::post('/logout','LoginController@logout');
});

Route::group(['namespace' => 'panell\song' ] , function (){
	Route::post('/song/{id}/restore','SongController@restore');
	Route::get('/song/list','SongController@list');
	Route::apiResource('/song','SongController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
