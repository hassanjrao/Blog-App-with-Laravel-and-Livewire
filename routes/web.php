<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(["auth"])->prefix("admin")->name("admin.")->group(function (){

    Route::get("dashboard",[DashboardController::class,"index"])->name("dashboard.index");
    Route::get("/",[DashboardController::class,"index"])->name("dashboard.index");


    Route::get("profile", [ProfileController::class, "index"])->name("profile.index");
    Route::put("profile/{id}/update", [ProfileController::class, "update"])->name("profile.update");
    Route::put("profile/{id}/update-password", [ProfileController::class, "updatePassword"])->name("profile.updatePassword");


});
