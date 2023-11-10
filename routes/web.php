<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClienteController;

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
        Route::put('/estatus/editar', [RolController::class, "CambiarEstatus"]);
        Route::delete('/eliminar', [RolController::class, "eliminar"]);
        Route::post('/crear', [RolController::class, "crear"]);
        Route::get('/editar/{id?}', [RolController::class, "editar"])->name('editar_rol');
        Route::put('/editar', [RolController::class, "modificar"]);
    });

    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsuarioController::class, "index"])->name('usuarios');
        Route::get('/nuevo', [UsuarioController::class, "nuevo"])->name('nuevo_usuario');
        Route::put('/estatus/editar', [UsuarioController::class, "CambiarEstatus"]);
        Route::delete('/eliminar', [UsuarioController::class, "eliminar"]);
    });

    Route::prefix('empresa')->group(function () {
        Route::get('/', [EmpresaController::class, "index"])->name('empresa');
        Route::post('/guardar', [EmpresaController::class, "guardarEmpresa"])->name('guardarEmpresa');
        Route::post('/guardarCuenta', [EmpresaController::class, "guardarCuenta"])->name('guardarCuenta');
        Route::delete('/eliminarCuenta', [EmpresaController::class, "eliminarCuenta"]);
        Route::put('/editCuenta', [EmpresaController::class, "cambiarEstatusCuenta"]);

    });

    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, "index"])->name('clientes');
    });
});
// Route::get('/empresa', [EmpresaController::class, "index"])->middleware('auth')->name('empresa');
