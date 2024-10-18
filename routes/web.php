<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::view('/', 'index')->name('home');

Route::get('/misProductos', [ProductController::class, 'index'])->name('misProductos')->middleware('role:2'); // Muestra solo los productos del usuario logueado
Route::view('/misProductos/store', 'formProduc')->name('misProductos.store')->middleware('role:2'); // Muestra solo los productos del usuario logueado

// Ruta para gestionar los productos (CRUD completo)
Route::resource('products', ProductController::class)->except(['index', 'destroy'])->middleware('role:2'); // Elimina 'index' para evitar conflicto con la ruta '/misProductos'

// Ruta para mostrar el catálogo de productos
Route::get('/catalogo', [ProductController::class, 'catalogo'])->name('catalogo')->middleware('role:1');;

// FIN RUTA DE PRODUCTOS


// RUTAS CARRITO

// Ruta agregar productos carrito
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregarAlCarrito'])->name('carrito.agregar')->middleware('role:1');;

// Ruta ver carrito
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver')->middleware('role:1');;

// Ruta eliminar producto carrito
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminarDelCarrito'])->name('carrito.eliminar')->middleware('role:1');;

// Ruta actualizar carrito
Route::patch('/carrito/{id}/actualizar', [CarritoController::class, 'actualizar'])->name('carrito.actualizar')->middleware('role:1');;
