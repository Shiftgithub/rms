<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
// index 
Route::get("/",[HomeController::class,"index"]);

// user part
Route::get("/users",[AdminController::class,"user"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);

//food menu part
Route::get("/foodmenu",[AdminController::class,"foodmenu"]);
Route::get("/editmenu/{id}",[AdminController::class,"editfoodmenu"]);
Route::get("/deletemenu/{id}",[AdminController::class,"deletemenu"]);
Route::post("/uploadfood",[AdminController::class,"uploadfoodmenu"]);
Route::post("/update/{id}",[AdminController::class,"update"]);

//reservation part 
Route::post("/reservation",[AdminController::class,"reservation"]);
Route::get("/viewreservation",[AdminController::class,"viewreservation"]);

//chef part
Route::post("/chefinfoupload",[AdminController::class,"chefinfoupload"]);
Route::post("/editchefinfo/{id}",[AdminController::class,"editchefinfo"]);
Route::get("/viewchefs",[AdminController::class,"viewchefs"]);
Route::get("/updatechefinfo/{id}",[AdminController::class,"updatechefinfo"]);
Route::get("/deletchefinfo/{id}",[AdminController::class,"deletchefinfo"]);

//add cart

Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::get("/cartremove/{id}",[HomeController::class,"cartremove"]);

//order food

Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);
Route::get("/orders",[AdminController::class,"orders"]);

// redirect

Route::get("redirects",[HomeController::class,"redirects"] );

//search 

Route::get("/search",[AdminController::class,"search"]);

//
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
