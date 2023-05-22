<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TiposController;
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

Route::middleware(['auth'])->group(function () {
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get("/produtos", [App\Http\Controllers\ProdutosController::class,'index'])->name('produtos.index');
    Route::get("/produtos/edit/{id}", [App\Http\Controllers\ProdutosController::class,'edit'])->name('produtos.edit');
    Route::get("/produtos/create", [App\Http\Controllers\ProdutosController::class,'create'])->name('produtos.create');
    Route::post("/produtos/store", [App\Http\Controllers\ProdutosController::class,'store'])->name('produtos.store');
    Route::post("/produtos/update", [App\Http\Controllers\ProdutosController::class,'update'])->name('produtos.update');
    Route::delete('/produtos/{id}', [App\Http\Controllers\ProdutosController::class,'destroy'])->name('produtos.destroy');

    Route::resource("/tipos", TiposController::class);
});

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

