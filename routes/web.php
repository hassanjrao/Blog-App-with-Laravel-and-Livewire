<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeftBarsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RightBarsController;
use App\Http\Controllers\BlogController as ControllersBlogController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
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



Auth::routes(["register"=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/blog/{id}/{slug}",[ControllersBlogController::class, 'show'])->name('blog.show');

Route::get("/category/{id}/{slug}",[ControllersCategoryController::class, 'show'])->name('category.show');


Route::middleware(["auth"])->prefix("admin")->name("admin.")->group(function (){

    Route::get("dashboard",[DashboardController::class,"index"])->name("dashboard.index");
    Route::get("/",[DashboardController::class,"index"])->name("dashboard.index");


    Route::get("profile", [ProfileController::class, "index"])->name("profile.index");
    Route::put("profile/{id}/update", [ProfileController::class, "update"])->name("profile.update");
    Route::put("profile/{id}/update-password", [ProfileController::class, "updatePassword"])->name("profile.updatePassword");

    Route::resource("categories",CategoryController::class);

    Route::resource("blogs",BlogController::class);

    Route::resource('left-bars', LeftBarsController::class);


    Route::get("blogs/{id}/comments",[BlogController::class,"comments"])->name("blog.comments");
    Route::delete("blogs/{id}/comments",[BlogController::class,"destroyComment"])->name("blog.destroy.comment");

    Route::resource('right-bars', RightBarsController::class);

});


Route::get("storage-link",function(){
    Artisan::call("storage:link");

    return "Storage link created";
});
