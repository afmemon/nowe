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


Route::get("/login", function(){
    return view('/login');
})->middleware('login');

Route::get("/", "loginProcessController@index")->name('login')->middleware('login');
Route::post("/loginProcess", "loginProcessController@loginProcess")->name("loginProcess");
Route::get("/logout", "loginProcessController@logout")->name("logout");


Route::group(["prefix" => "admin"], function(){
    Route::get("/", "UsManagerController@index");
    Route::get("/changeRole/{country_id}/{partner_organization_id}/{user_type_id}", "UsManagerController@changeRole");
});


Route::group(["prefix" => "partner"], function(){
    Route::get("/", "PartnerController@index");
    Route::get("/changeRole/{country_id}/{partner_organization_id}/{user_type_id}", "PartnerController@changeRole");
    Route::get("/changeRoleInUsManager/{user_type_id}", "PartnerController@changeRoleInUsManager");

});

Route::group(["prefix" => "district"], function(){
    Route::get("/", "DistrictController@index");
    Route::get("/changeRole/{country_id}/{partner_organization_id}/{user_type_id}", "DistrictController@changeRole");
    Route::get("/changeRoleInUsManager/{user_type_id}", "DistrictController@changeRoleInUsManager");
    Route::get('/AddNoweFamily', "DistrictController@AddNoweFamily");
    Route::post('/InsertNoweFamily',"DistrictController@InsertNoweFamily");
    Route::get("/EditNoweFamily/{id}", "DistrictController@EditNoweFamily");
    Route::put("/UpdateNoweFamily/{id}", "DistrictController@UpdateNoweFamily");
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');