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

Route::get('/home', 'HomeController@index')->name('home');
////Weight/////
//List of weights
Route::get('/ViewWeights', 'HomeController@ViewWeights');
//Create new weight
Route::post('/CreateWeight', 'HomeController@CreateWeight');
//Delete existing weight
Route::get('/DeleteWeight/{id}', 'HomeController@DeleteWeight');
///////////////////////////////////

////  country  ///// 
//Create new country
Route::post('/CreateCountry', 'HomeController@CreateCountry');
//List of countries
Route::get('/ViewCountry', 'HomeController@ViewCountry');
//Delete existing country
Route::get('/DeleteCountry/{id}', 'HomeController@DeleteCountry');
/////////////////////// 

////  safe  ///// 
//Create new safe
Route::post('/CreateSafe', 'HomeController@CreateSafe');
//List of safes
Route::get('/ViewSafes', 'HomeController@ViewSafes');
//Delete existing safe
Route::get('/DeleteSafe/{id}', 'HomeController@DeleteSafe');
///////////////////////

////  bar  ///// 
//Create new safe
Route::post('/CreateBar', 'HomeController@CreateBar');
//List of safes
Route::get('/ViewBars', 'HomeController@ViewBars');
//Delete existing safe
Route::get('/DeleteBar/{id}', 'HomeController@DeleteBar');
/////////////////////// 

