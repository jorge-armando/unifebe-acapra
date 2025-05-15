<?php

use App\Http\Controllers\Admin\AnaliseFormController;
use App\Http\Controllers\User\EnviadoController;
use App\Http\Controllers\User\QueroAdotarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AddPetController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\ListaHomeController;

Route::get('/', [UserHomeController::class, 'mostrarTela']);
Route::get('/pets', [ListaHomeController::class, 'mostrarTela']);
Route::get('/quero-adotar', [QueroAdotarController::class, 'execute']);
Route::get('/quero-adotar/enviado', [EnviadoController::class, 'execute']);

Route::get('/admin', [AdminHomeController::class, 'execute']);
Route::get('/admin/pets', [AdminHomeController::class, 'execute']);
Route::get('/admin/pets/add', [AddPetController::class, 'execute']);
Route::get('/admin/pets/edit/{id}', [AddPetController::class, 'execute']);
Route::get('/admin/forms', [formsController::class, 'execute']);
Route::get('/admin/forms/{id}', [AnaliseFormController::class, 'execute']);
Route::get('/admin/cadastro', [CadastroController::class, 'execute']);
Route::get('/admin/login', [LoginController::class, 'execute']);
