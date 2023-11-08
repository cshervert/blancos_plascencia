<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;

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
        Route::get('/nuevo', [RolController::class, "nuevo"])->name('nuevo');
        Route::post('/crear', [RolController::class, "crear"]);
        Route::delete('/eliminar', [RolController::class, "eliminar"]);
        Route::get('/editar/{id?}', [RolController::class, "editar"])->name('editar');
        Route::put('/editar', [RolController::class, "modificar"]);
    });
    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsuarioController::class, "index"])->name('usuarios');
    });
    Route::prefix('empresa')->group(function () {
        Route::get('/', [EmpresaController::class, "index"])->name('empresa');
        Route::post('/save', [EmpresaController::class, "saveEmpresa"])->name('saveEmpresa');
    });
});
// Route::get('/empresa', [EmpresaController::class, "index"])->middleware('auth')->name('empresa');
