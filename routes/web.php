<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');});
Route::get('/userregister', [App\Http\Controllers\UserController::class, 'userregister']);
Route::get('/adminlogin', [App\Http\Controllers\UserController::class, 'adminlogin']);
Route::get('/userlogin', [App\Http\Controllers\UserController::class, 'userlogin']);
Route::get('/logingoogle', [App\Http\Controllers\UserController::class, 'logingoogle']);
Route::get('/googlecallback', [App\Http\Controllers\UserController::class, 'googlecallback']);
Auth::routes();
Route::middleware('auth')->group(static function () {

Route::post('/userregister', [App\Http\Controllers\UserController::class, 'saveuser']);
Route::put('/updateuser/{id}', [App\Http\Controllers\UserController::class, 'updateuser']);
Route::post('/updateuserbyadmin', [App\Http\Controllers\UserController::class, 'updateuserbyadmin']);
Route::post('/deleteuserbyadmin', [App\Http\Controllers\UserController::class, 'deleteuserbyadmin']);









    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   
});