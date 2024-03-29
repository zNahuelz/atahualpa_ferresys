<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitTypeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DashboardMiddleware;
use App\Http\Middleware\VendedorMiddleware;
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

/*
*   Rutas para inicio de sesión, registro y dashboard.
*/
Route::get('/', function () {
    return view('login');
})->middleware(AuthMiddleware::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(DashboardMiddleware::class);

Route::get('/register', function () {
    return view('register');
})->middleware(AuthMiddleware::class);


Route::post('/logout', [UserController::class, 'logout']);

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

/*
*   Grupo de rutas para tipo de unidad.
*/
Route::group([
    'middleware' => DashboardMiddleware::class,
    'prefix' => '/dashboard/ut'
], function ($router) {
    Route::get('/list', [UnitTypeController::class, 'listUnitTypes']);
    Route::post('/new', [UnitTypeController::class, 'createUnitType'])->middleware(['vendedor','observador']);
});

/*
*   Grupo de rutas para productos.
*/
Route::group([
    'middleware' => DashboardMiddleware::class,
    'prefix' => '/dashboard/p'
], function ($router) {
    Route::get('/list', [ProductController::class, 'listProducts']);
    Route::get('/new', [ProductController::class, 'getCreateProduct'])->middleware(['vendedor','observador']);
    Route::post('/new', [ProductController::class, 'createProduct'])->middleware(['vendedor','observador']);
    Route::get('/details/{id}', [ProductController::class, 'productDetails']);
});

/*
*   Grupo de rutas para proveedores.
*/
Route::group([
    'middleware' => DashboardMiddleware::class,
    'prefix' => '/dashboard/s'
], function ($router) {
    Route::get('/list', [SupplierController::class, 'listSuppliers']);
    Route::get('/new', [SupplierController::class, 'getCreateSupplier'])->middleware(['vendedor','observador']);
    Route::post('/new', [SupplierController::class, 'createSupplier'])->middleware(['vendedor','observador']);
    Route::get('/edit/{supplier}', [SupplierController::class, 'editSupplier'])->middleware(['vendedor','observador']);
    Route::put('/edit/{id}', [SupplierController::class, 'updateSupplier'])->middleware(['vendedor','observador']);
    Route::get('/details/{id}', [SupplierController::class, 'supplierDetails']);
});

/*
*   Grupo de rutas para clientes.
*/
Route::group([
    'middleware' => DashboardMiddleware::class,
    'prefix' => '/dashboard/c'
], function ($router) {
    Route::get('/list', [ClientController::class, 'listClients']);
    Route::get('/new', [ClientController::class, 'getCreateClient'])->middleware(['observador']);
    Route::post('/new', [ClientController::class, 'createClient'])->middleware(['observador']);
    Route::get('/details/{id}', [ClientController::class, 'clientDetails']);
    Route::get('/edit/{id}', [ClientController::class, 'editClient'])->middleware(['observador']);
    Route::put('/edit/{id}', [ClientController::class, 'updateClient'])->middleware(['observador']);
});

//Ruta para "Mi Cuenta"
Route::get('/dashboard/mp', [UserController::class, 'accountDetails'])->middleware(DashboardMiddleware::class);
Route::put('/dashboard/mp/edit/{id}', [UserController::class, 'updateUser'])->middleware(DashboardMiddleware::class);
/*
*  Grupo de rutas para gestión de cuentas.
*/
Route::group([
    'middleware' => ['dashboard','vendedor','observador'],
    'prefix' => '/dashboard/ua'
], function ($router){
    Route::get('/list', [AccountController::class, 'listAccounts']);
    Route::get('/register', [AccountController::class, 'getRegister']);
    Route::post('/register', [AccountController::class, 'register']);
});
