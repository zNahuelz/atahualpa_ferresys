<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitTypeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DashboardMiddleware;
use App\Models\Product;
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

Route::get('/', function () {
    return view('login');
})->middleware(AuthMiddleware::class);


Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware(DashboardMiddleware::class);

Route::get('/register', function(){
    return view('register');
})->middleware(AuthMiddleware::class);


Route::post('/logout', [UserController::class, 'logout']);

Route::post('/register',[UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard/ut/list', [UnitTypeController::class, 'listUnitTypes'])->middleware(DashboardMiddleware::class);

Route::post('/dashboard/ut/new', [UnitTypeController::class, 'createUnitType'])->middleware(DashboardMiddleware::class);

Route::get('/dashboard/p/list', [ProductController::class, 'listProducts'])->middleware(DashboardMiddleware::class);
