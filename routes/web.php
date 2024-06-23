<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
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


Auth::routes();
 
Route::middleware('auth')->group(function() {
    
    Route::get('/', function () {
        return redirect('dashboard');
    });

    Route::resource('dashboard', DashboardController::class);
    Route::resource('admin', AdministracionController::class);
    Route::get('dashboard/prestamo/{inicio}/{fin}', [DashboardController::class, 'prestamos']);
    Route::get('backup/json', [BackupController::class, 'json']);
    Route::get('backup/restaurar/{file}', [BackupController::class, 'restore']);
    Route::get('backup', [BackupController::class, 'index'])->name('backup.index');
    Route::get('dashboard/usuario/global', [DashboardController::class, 'usuario_prestamo']);
    Route::get('dashboard/usuario/libro/{usuario}', [DashboardController::class, 'usuario_prestamo_libro']);
    Route::resource('author', AuthorController::class);
    Route::get('author/json/get', [AuthorController::class, 'json']);

    Route::resource('categoria', CategoriaController::class);
    Route::get('categoria/json/get', [ CategoriaController::class, 'json']);

    Route::resource('editorial', EditorialController::class);
    Route::get('editorial/json/get', [ EditorialController::class, 'json']);

    Route::resource('usuario', UsuarioController::class);
    Route::get('usuario/json/get', [ UsuarioController::class, 'json']);

    Route::resource('recurso', RecursoController::class);
    Route::get('recurso/json/get', [ RecursoController::class, 'json']);

    Route::resource('prestamo', PrestamoController::class);
    Route::put('prestamo/devolucion/{id}', [PrestamoController::class, 'devolucion']);

    Route::get('permisos/{usuario}', [PermisosController::class, 'index']);
    Route::post('permisos/{usuario}', [PermisosController::class, 'store']);

    Route::get('user/admin', [UserController::class, 'index'])->name('user.index');
    Route::get('user/permisos/', [UserController::class, 'permisos'])->name('user.permisos');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
