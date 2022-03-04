<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
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

// Route::get('/', function () {
//     return view('pages.auth.login');
// });


Route::get('/',[loginController::class,'halamanLogin'])->name('login');
Route::any('/postlogin',[loginController::class,'Login']);
Route::get('/register',[loginController::class,'halamanRegister'])->name('register');
Route::post('/simpanUser',[loginController::class,'simpanRegister']);


    Route::get('/dashboard',[dashboardController::class,'index']);
    Route::get('/perjalanan',[dashboardController::class,'perjalanan']);
    Route::any('/simpanPerjalanan',[dashboardController::class,'simpanPerjalanan']);
    Route::get('/cari',[dashboardController::class,'cariPerjalanan']);
   
    Route::get('/logout',[loginController::class,'LogOut']);


 
 //Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
