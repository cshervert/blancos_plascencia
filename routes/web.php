<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SucursalController;

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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', [LoginController::class, "index"])->name('login');
Route::post('/login', [LoginController::class, "login"]);
Route::get('/logout', [LogoutController::class, "logout"]);

Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::prefix('roles')->group(function () {
        Route::get('/', [RolController::class, "index"])->name('roles');
        Route::get('/nuevo', [RolController::class, "nuevo"])->name('nuevo_rol');
        Route::post('/crear', [RolController::class, "crear"]);
        Route::put('/estatus/editar', [RolController::class, "CambiarEstatus"]);
        Route::delete('/eliminar', [RolController::class, "eliminar"]);
        Route::get('/editar/{id?}', [RolController::class, "editar"])->name('editar_rol');
        Route::put('/editar', [RolController::class, "modificar"]);
    });

    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsuarioController::class, "index"])->name('usuarios');
        Route::get('/nuevo', [UsuarioController::class, "nuevo"])->name('nuevo_usuario');
        Route::post('/crear', [UsuarioController::class, "crear"]);
        Route::put('/estatus/editar', [UsuarioController::class, "CambiarEstatus"]);
        Route::delete('/eliminar', [UsuarioController::class, "eliminar"]);
        Route::get('/editar/{id?}', [UsuarioController::class, "editar"])->name('editar_usuario');
        Route::get('/imagen/{id?}', [UsuarioController::class, "getImagen"]);
        Route::post('/editar/general', [UsuarioController::class, "modificarGeneral"]);
    });

    Route::prefix('empresa')->group(function () {
        Route::get('/', [EmpresaController::class, "index"])->name('empresa');
        Route::post('/guardar', [EmpresaController::class, "guardarEmpresa"])->name('guardarEmpresa');
        Route::post('/guardarCuenta', [EmpresaController::class, "guardarCuenta"])->name('guardarCuenta');
        Route::delete('/eliminarCuenta', [EmpresaController::class, "eliminarCuenta"]);
        Route::put('/editCuenta', [EmpresaController::class, "cambiarEstatusCuenta"]);

    });

    Route::prefix('sucursales')->group(function () {
        Route::get('/', [SucursalController::class, "index"])->name('sucursales');
        Route::get('/nuevo', [SucursalController::class, "nuevo"])->name('nueva_sucursal');
        Route::post('/crear', [SucursalController::class, "crear"]);
        Route::put('/estatus/editar', [SucursalController::class, "cambiarEstatus"]);
        Route::delete('/eliminar', [SucursalController::class, "eliminar"]);
        Route::get('/editar/{id?}', [SucursalController::class, "editar"])->name('editar_sucursal');
        Route::put('/editar', [SucursalController::class, "modificar"]);
    });
    
    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, "index"])->name('clientes');
        Route::get('/nuevo', [ClienteController::class, "nuevo"])->name('nuevo_cliente');
        Route::delete('/eliminar', [ClienteController::class, "eliminar"]);
    });
});
// Route::get('/empresa', [EmpresaController::class, "index"])->middleware('auth')->name('empresa');
