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


Route::get('/curriculo', [CurriculoController::class, 'show'])->name('index');
Route::post('/curriculo', [CurriculoController::class, 'edit'])->name('index');
//Route::get('/cadastrar', [CadastroController::class, 'index'])->name('curriculo.index');
//Route::post('curriculo', [CadastroController::class, 'store'])->name('curriculo.store');
Route::get('/editar', [CadastroController::class, 'edit'])->name('curriculo.edit');
Route::post('/editar', [CadastroController::class, 'update'])->name('curriculo.update');

Route::get('/excluir/{id}', [CadastroController::class, 'destroy'])->name('curriculo.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/curriculo', [CurriculoController::class, 'edit'] )->name('dashboard');
