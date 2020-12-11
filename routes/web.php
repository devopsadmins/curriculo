<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'show'])->name('index');

Route::get('/admin',[AdminController::class,'show'])->name('curriculos');
Route::get('/admin/perfis',[AdminController::class,'perfis'])->name('admin.perfis');
Route::post('/admin/users',[AdminController::class,'users'])->name('admin.users');
Route::get('/admin/curriculo/{id}',[AdminController::class,'curriculo'])->name('admin.curriculo');
Route::post('/admin/upperAdmin/{id}',[AdminController::class,'upperAdmin'])->name('admin.upperAdmin');

Route::get('/admin/cidades',[AdminController::class,'show'])->name('admin.cidades');
Route::get('/admin/areas',[AdminController::class,'show'])->name('admin.areas');

Route::post('/curriculo', [CurriculoController::class, 'update'])->name('curriculo.update');
Route::get('/curriculo', [CurriculoController::class, 'show'])->name('curriculo.index');

Route::get('/curriculo/excluir/{id}', [CadastroController::class, 'destroy'])->name('curriculo.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/curriculo', [CurriculoController::class, 'show'] )->name('dashboard');
