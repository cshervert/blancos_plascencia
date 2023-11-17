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
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ImpuestoController;
use App\Http\Controllers\CajaController;

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
        Route::get('/editar/{id?}/{section?}', [UsuarioController::class, "editar"])->name('editar_usuario');
        Route::get('/imagen/{id?}', [UsuarioController::class, "getImagen"]);
        Route::post('/editar/general', [UsuarioController::class, "modificarGeneral"]);
        Route::put('/editar/accesos', [UsuarioController::class, "modificarAcceso"]);
        Route::put('/editar/sucursales', [UsuarioController::class, "modificarSucursales"]);
        Route::put('/editar/permisos', [UsuarioController::class, "modificarPermisos"]);
    });

    Route::prefix('empresa')->group(function () {
        Route::get('/', [EmpresaController::class, "index"])->name('empresa');
        Route::post('/guardar', [EmpresaController::class, "guardarEmpresa"])->name('guardarEmpresa');
        Route::post('/guardarCuenta', [EmpresaController::class, "guardarCuenta"])->name('guardarCuenta');
        Route::delete('/eliminarCuenta', [EmpresaController::class, "eliminarCuenta"]);
        Route::put('/editCuenta', [EmpresaController::class, "cambiarEstatusCuenta"]);
    });

    Route::prefix('unidades')->group(function () {
        Route::get('/', [UnidadController::class, "index"])->name('unidades');
        Route::post('/crear', [UnidadController::class, "crear"]);
        Route::get('/editar/{id?}', [UnidadController::class, "editar"]);
        Route::put('/editar', [UnidadController::class, "modificar"]);
        Route::put('/estatus/editar', [UnidadController::class, "CambiarEstatus"]);
        Route::delete('/eliminar', [UnidadController::class, "eliminar"]);
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
        Route::post('/crear', [ClienteController::class, "crear"]);
        Route::get('/editar/{id?}', [ClienteController::class, "editar"])->name('editarCliente');
        Route::put('/editar', [ClienteController::class, "modificar"]);
        Route::delete('/eliminar', [ClienteController::class, "eliminar"]);
    });

    Route::prefix('proveedores')->group(function () {
        Route::get('/', [ProveedorController::class, "index"])->name('proveedores');
        Route::get('/nuevo', [ProveedorController::class, "nuevo"])->name('nuevo_proveedor');
        Route::post('/crear', [ProveedorController::class, "crear"]);
        Route::get('/editar/{id?}', [ProveedorController::class, "editar"])->name('editarProveedor');
        Route::put('/editar', [ProveedorController::class, "modificar"]);
        Route::delete('/eliminar', [ProveedorController::class, "eliminar"]);
    });

    Route::prefix('impuestos')->group(function () {
        Route::get('/', [ImpuestoController::class, "index"])->name('impuestos');
        Route::get('/nuevo', [ImpuestoController::class, "nuevo"])->name('nuevo_impuesto');
        Route::post('/crear', [ImpuestoController::class, "crear"]);
        Route::get('/editar/{id?}', [ImpuestoController::class, "editar"])->name('editar_impuesto');
        Route::put('/editar', [ImpuestoController::class, "modificar"]);
        Route::put('/estatus/editar', [ImpuestoController::class, "CambiarEstatus"]);
        Route::delete('/eliminar', [ImpuestoController::class, "eliminar"]);
    });

    Route::prefix('cajas')->group(function () {
        Route::get('/', [CajaController::class, "index"])->name('cajas');
        Route::post('/crear', [CajaController::class, "crear"]);
        Route::get('/editar/{id?}', [CajaController::class, "editar"]);
        Route::put('/editar', [CajaController::class, "modificar"]);
        Route::put('/estatus/editar', [CajaController::class, "CambiarEstatus"]);
        Route::delete('/eliminar', [CajaController::class, "eliminar"]);
    });
});
// Route::get('/empresa', [EmpresaController::class, "index"])->middleware('auth')->name('empresa');
