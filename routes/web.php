<?php

use App\Http\Controllers\UserController;
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

Route::get('/',function(){
    return redirect('/login');
});

Route::get('login',[UserController::class,'showLogin'])->name('login');

Route::post('doLogin',[UserController::class,'login']);

Route::get('super-admin-dashboard',[UserController::class,'superAdminDashboard'])->middleware('userHasRole:SUPER_ADMIN');

Route::get('admin-dashboard',[UserController::class,'adminDashboard'])->middleware('userHasRole:ADMIN');

Route::get('user-dashboard',[UserController::class,'userDashboard'])->middleware('isValidUser');
