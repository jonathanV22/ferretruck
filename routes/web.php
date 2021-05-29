<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProductoController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return view('welcome');
});


Route::group(['middleware'=>'auth'],function(){
    Route::get('/inicio', function () { 

        return view('dashboard');

    })->name('dashboard');
//Rutas Perfil
    Route::view('perfil', 'perfil')->name('perfil');

    Route::put('perfil',[PerfilController::class,'update'])->name('perfil.update');

//Fin rutas perfil
//Rutas de roles

    Route::resource('roles', RolController::class);

    Route::post('/roles/create', [RolController::class,'store'])->name('roles.store');

    Route::get('/roles/{role}',[RolController::class,'show'])->name('roles.show');

    Route::get('/roles/{role}/edit',[RolController::class,'edit'])->name('roles.edit');

    Route::put('/roles/{role}', [RolController::class, 'update'])->name('roles.update');

//fin rutas de roles
//Rutas productos
    /*Route::get('/productos', [ProductoController::class,'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class,'create'])->name('productos.create');*/

    Route::resource('productos', ProductoController::class);
//Fin rutas productos
});

require __DIR__.'/auth.php';
