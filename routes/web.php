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
    
    return view('/guest/index');
});
//Route::group(['namespace'=>'panell'],function (){
//Route::apiResource('/artist','ArtistController');
//});
Route::group(['middleware'=>'auth'],function (){
	Route::get('/music/panell', function () {

		return view('admin\dashboard');
	});
});
// ------------------------------------ AUTH ------------------------------------

Route::group(['namespace' => 'Auth'] , function (){
	Route::post('/login','LoginController@login');
	Route::post('/logout','LoginController@logout');
});
// ------------------------------------ admin ------------------------------------

Route::group(['namespace' => 'panell\artist' ,'prefix'=>'music','middleware'=>'auth'] , function (){
	Route::get('artist/create','ArtistController@create');
	Route::get('/artist/{id}/edit','ArtistController@edit');

	Route::post('/artist/{id}/restore','ArtistController@restore');
	Route::get('/artist/list','ArtistController@list');
	Route::apiResource('/artist','ArtistController');
});
Route::group(['namespace'=>'frontend'],function (){
	Route::get('/song/{id}','SongController@show');
}
);


Route::group(['namespace' => 'panell\song' , 'prefix' => 'music','middleware'=>'auth'] , function (){
	Route::get('/create','SongController@create');
	Route::post('/song/{id}/restore','SongController@restore');
	Route::get('/song/{id}/edit','SongController@edit');
	Route::get('/song/list','SongController@list');
	Route::apiResource('/song','SongController');
});
Route::group(['namespace' => 'panell\album' , 'prefix' => 'music','middleware'=>'auth'] , function (){
	Route::get('/album/create','AlbumController@create');
	Route::get('/album/{id}/create_song','AlbumController@create_song');

//	Route::post('/album/{id}/restore','SongController@restore');
//	Route::get('/album/{id}/edit','SongController@edit');
//	Route::get('/album/list','SongController@list');
	Route::apiResource('/album','AlbumController');
});


Route::group(['namespace' => 'panell\category' , 'prefix' => 'music','middleware'=>'auth'] , function (){

	Route::Resource('/category','CategoryController');
});
Route::group(['namespace' => 'panell\Setting' , 'prefix' => 'music','middleware'=>'auth'] , function (){
Route::get('slider/{id}/update','SliderController@updateslider');
Route::get('slider/{song}/true','SliderController@addslider');

	Route::Resource('/slider','SliderController');
});

Route::group(['namespace' => 'panell\History' , 'prefix' => 'music','middleware'=>'auth'] , function (){

	Route::get('/history/{id}/show','HistoryController@analyze_data');
	Route::get('/history/{id}/sort','HistoryController@sort_history');
});
Route::group(['namespace' => 'panell\genre' , 'prefix' => 'music','middleware'=>'auth'] , function (){

	Route::Resource('/genre','GenreController');
});

// ------------------------------------ home ------------------------------------

Route::group(['namespace' => 'Home' , 'prefix' => 'music'] , function (){

	Route::get('/home','HomeController@sliders');
	Route::get('/home/view/{song}','HomeController@single_song_view');
});
// ------------------------------------ like and comment ------------------------------------
Route::group(['namespace' => 'Opinion\Like' , 'prefix' => 'music'] , function (){
	Route::post('/like/{song}','LikeController@store_like');
	Route::apiResource('/like','LikeController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/artist/list/api','panell\artist\ArtistController@list');
