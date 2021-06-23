<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\MajorController;
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
//Them URL
Route::get('/', function () {
    return view('dashboard');
});
// Route::get('/class', function () {
//     return view('class.index');
// });

//CRUD Class
Route::resource('class',ClassroomController::class);

Route::resource('major',MajorController::class);
