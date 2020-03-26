<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home', 'HomeController@index')->name('home');

Route::get('getAvatar/{avatarName}', 'HomeController@getAvatar')->name('getAvatar');


Route::get('lang/{locale}', 'HomeController@lang')->name('lang');

Route::get('register-step2', 'Auth\RegisterStep2Controller@showForm')->name('register.step2');
Route::post('register-step2', 'Auth\RegisterStep2Controller@postForm');

Route::get('api/v1/getRegions/{id}','Api\V1\CountriesApiController@getRegions');
Route::get('api/v1/getCities/{id}','Api\V1\CountriesApiController@getCities');

Route::get('api/v1/getUsers','Api\V1\UsersApiController@getUsers')->name('Api/getUsers');

Route::get('profile/{username}/', 'UserController@show')->name('user.show');
Route::get('@{username}/', 'UserController@show');

Route::get('dating', 'UserController@index')->name('dating.index');

Route::get('photos/{username}/', 'PhotoController@show')->name('user.photos');

Route::get('photo/upload', 'PhotoController@upload')->name('photo.upload');
Route::post('photo/upload', 'PhotoController@store');

Route::get('photo/show/{photoId}', 'PhotoController@show')->name('photo.show');

Route::get('photo/edit/{photoId}', 'PhotoController@edit')->name('photo.edit');
Route::post('photo/edit/{photoId}', 'PhotoController@update');

Route::get('edit', 'UserController@edit')->name('user.edit');
Route::post('edit', 'UserController@update');

Route::get('edit/avatar', 'UserController@editAvatar')->name('user.editAvatar');
Route::post('edit/avatar', 'UserController@updateAvatar');

Route::post('publication/create', 'PublicationController@store')->name('publication.create');
Route::get('publication/show/{publicationId}', 'PublicationController@show')->name('publication.show');
