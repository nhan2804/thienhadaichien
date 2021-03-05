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
    return view('page.home');
});
Route::get('/login','HomeController@login');
Route::get('/logout','HomeController@logout');
Route::post('/login','UserController@login');
Route::post('/register','UserController@register');

Route::prefix('dashboard')->middleware(['login'])->group(function () {
	Route::post('/user/choose-planet/','DashboardController@choose_planet');
	Route::post('/user/planet/','DashboardController@planet');
	Route::get('/user/{id}','DashboardController@choose_planet');
    Route::get('/update-all','DashboardController@update_all');
	
    Route::post('/build/destroy','DashboardController@destroy_c');
    Route::get('/build/built','DashboardController@built');
	Route::get('/build/hide','DashboardController@hideAll');
    Route::resource('/build','DashboardController');
    Route::get('/build/construct-detail/{id}','DashboardController@detail_construct');
    
    Route::get('/build/buy/{id}/{num}','DashboardController@buy_construct');
    Route::get('/build/set-status/{id}','DashboardController@set_status');
    
    
    
    
    Route::get('/build/set-status-hide/{id}','DashboardController@set_status_hide');
    Route::get('/build/hide','DashboardController@hideAll');
    Route::get('/init','DashboardController@init');

    Route::post('/military/destroy','MilitaryController@destroy_m');
    Route::get('/military/hide','MilitaryController@hideAll');
    Route::resource('/military','MilitaryController');
    Route::get('/military/detail/{id}','MilitaryController@detail');
    Route::get('/military/set-status/{id}','MilitaryController@set_status');
    Route::get('/military/set-status-hide/{id}','MilitaryController@set_status_hide');
    Route::get('/military/buy/{id}/{num}','MilitaryController@buy');


    Route::get('/overview','HomeUserController@overview');
    Route::get('/news','HomeUserController@news');
    Route::get('/intelligence-agencies','HomeUserController@intelligence_agencies');
    Route::get('/headquarter','HomeUserController@headquarter');
    Route::get('/headquarter/army','HomeUserController@army');
    Route::get('/headquarter/colony','HomeUserController@colony');
    Route::get('/market','HomeUserController@market');
    // Trang thống kê
    Route::get('/','HomeUserController@index');
    Route::get('/setup','HomeUserController@setup');



    //Nghiên cứu
    
    Route::get('/research','ResearchController@index');
    Route::get('/research/buy/{id}','ResearchController@buy');
    Route::post('/research/set-status','ResearchController@set_status');
    
});

Route::prefix('admin')->group(function () {
    Route::resource('/user','Admin\AdminController');
    Route::resource('/resource','Admin\ResourceController');
    Route::resource('/planet','Admin\PlanetController');
    Route::resource('/construction','Admin\ConstructionController');
    Route::prefix('construction')->group(function () {
    	Route::get('{id}/produce','Admin\ConstructionController@produce');
    	Route::post('/produce','Admin\ConstructionController@save_produce');

    	Route::get('{id}/param','Admin\ConstructionController@param');
    	Route::post('/param','Admin\ConstructionController@save_param');

    	Route::get('{id}/payload','Admin\ConstructionController@payload');
    	Route::post('/payload','Admin\ConstructionController@save_payload');
    });
    Route::prefix('military')->group(function () {
    	Route::get('{id}/param','Admin\MilitaryController@param');
    	Route::post('/param','Admin\MilitaryController@save_param');

    	Route::get('{id}/payload','Admin\MilitaryController@payload');
    	Route::post('/payload','Admin\MilitaryController@save_payload');
    });

    Route::resource('/military','Admin\MilitaryController');
    Route::resource('/research','Admin\ResearchController');
    Route::post('/planet/buff','Admin\PlanetController@save_buff');
    Route::get('/planet/buff/{id}','Admin\PlanetController@buff');
    
});