<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolControlller;
use App\Http\Controllers\UserController;
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
Route::get('/home-page', function () {
    return view('home-page');
});


Route::group(['middleware'=>'auth'],function(){
    Route::get('/inicio', function () { 

        return view('dashboard');

    })->name('dashboard');
//Rutas Perfil
    Route::view('perfil', 'perfil')->name('perfil');

    Route::put('perfil',[PerfilController::class,'update'])->name('perfil.update');
//Rutas users
    
    Route::resource('/users', UserController::class);
//Fin rutas perfil
//Rutas de roles
    Route::resource('/roles',RolControlller::class);
//fin rutas de roles
//Rutas productos
    /*Route::get('/productos', [ProductoController::class,'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class,'create'])->name('productos.create');*/

    Route::resource('productos', ProductoController::class);
//Fin rutas productos
});

require __DIR__.'/auth.php';
