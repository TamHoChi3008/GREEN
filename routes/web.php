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
 //==============[ADMIN CONTROLLER]==============//
 Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard']);
 Route::get('/admin_login', [\App\Http\Controllers\AdminController::class, 'login']);
 Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
 Route::POST('/handle_login_admin', [\App\Http\Controllers\AdminController::class, 'handle_login_admin']);
    //----category----//
    Route::get('/add_category', [\App\Http\Controllers\AdminController::class, 'add_category']);
    Route::get('/show_category', [\App\Http\Controllers\AdminController::class, 'show_category']);
    Route::get('/edit_category', [\App\Http\Controllers\AdminController::class, 'edit_category']);
    Route::delete('/delete_category', [\App\Http\Controllers\AdminController::class, 'delete_category']);
    Route::POST('/save_add_category', [\App\Http\Controllers\AdminController::class, 'save_add_category']);
    Route::POST('/save_edit_category', [\App\Http\Controllers\AdminController::class, 'save_edit_category']);
    //----brand----//
    Route::get('/add_brand', [\App\Http\Controllers\AdminController::class, 'add_brand']);
    Route::get('/show_brand', [\App\Http\Controllers\AdminController::class, 'show_brand']);
    Route::get('/edit_brand', [\App\Http\Controllers\AdminController::class, 'edit_brand']);
    Route::delete('/delete_brand', [\App\Http\Controllers\AdminController::class, 'delete_brand']);
    Route::POST('/save_add_brand', [\App\Http\Controllers\AdminController::class, 'save_add_brand']);
    Route::POST('/save_edit_brand', [\App\Http\Controllers\AdminController::class, 'save_edit_brand']);
    //----product----//
    Route::get('/add_product', [\App\Http\Controllers\AdminController::class, 'add_product']);
    Route::get('/show_product', [\App\Http\Controllers\AdminController::class, 'show_product']);
    Route::get('/edit_product', [\App\Http\Controllers\AdminController::class, 'edit_product']);
    Route::delete('/delete_product', [\App\Http\Controllers\AdminController::class, 'delete_product']);
    Route::POST('/save_add_product', [\App\Http\Controllers\AdminController::class, 'save_add_product']);
    Route::POST('/save_edit_product', [\App\Http\Controllers\AdminController::class, 'save_edit_product']);


 //==============[HOME CONTROLLER]==============//
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

 //==============[HOME CONTROLLER]==============//
 Route::get('/Men', [\App\Http\Controllers\LoadController::class, 'Load_product_Men']);






