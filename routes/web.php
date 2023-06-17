<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DetalleFacturaController;
use App\Http\Controllers\EmisorController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;

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

//Route::get('/', function () {
    
  //  return view('welcome');

//});

//Rutas Login---------------------

Route::view('/register', 'auth.register')->name('register');

Route::view('/login', 'auth.login')->name('login');

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//-------------------------------------------------


Route::view('/', 'welcome')->name('inicio');


//Rutas cliente-----------

Route::resource('/clientes',ClienteController::class);


//Rutas Detalle--------
Route::resource('/DetalleFacturas',DetalleFacturaController::class);

//Rutas factura--------------

Route::resource('/facturas',FacturaController::class);
Route::get('cliente/facturas/{id}',[FacturaController::class,'clientes'])->name('cliente.facturas');
Route::get('cliente/factura/{id}',[FacturaController::class,'factura'])->name('factura.detalle');
Route::get('factura/enviar',[FacturaController::class,'vistaEnviar'])->name('factura.enviar');

//Route::get('factura/{facturas}',[FacturaController::class,'mostrar2'])->name('factura.mostrar');


Route::post('factura/seleccionadas',[FacturaController::class,'seleccionadas'])->name('factura.seleccion');

Route::post('factura/datos',[FacturaController::class,'datosEnviar'])->name('datos.enviar');

//Rutas Producto--------
Route::get('/productos',[ProductoController::class, 'index'])->name('productos.index');


Route::resource('/productos',ProductoController::class);

//Rutas Emisor---------
Route::resource('/emisors',EmisorController::class);

