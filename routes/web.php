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

Route::get('/', [HomeController::class, 'execute']);
Route::get('/admin/home', [AdminHomeController::class, 'execute']);
Route::get('/admin/addpet', [AddPetController::class, 'execute']);
Route::get('/admin/forms', [formsController::class, 'execute']);
Route::get('/admin/analiseFormulario', [AnaliseFormController::class, 'execute']);
Route::get('/cadastro', [CadastroController::class, 'execute']);
Route::get('/login', [LoginController::class, 'execute']);
Route::get('/user/queroAdotar', [QueroAdotarController::class, 'execute']);
Route::get('/user/enviado', [EnviadoController::class, 'execute']);
Route::get('/user/home', [UserHomeController::class, 'mostrarTela']);
Route::get('/user/lista', [ListaHomeController::class, 'mostrarTela']);
