<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AnaliseFormController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AddPetController;
use App\Http\Controllers\Admin\AddPetPostController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\Admin\CadastroController;
use App\Http\Controllers\User\EnviadoController;
use App\Http\Controllers\User\QueroAdotarController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\ListaHomeController;
use App\Http\Controllers\User\AnimalHomeController;
use App\Http\Controllers\AdocaoController;


use App\Http\Middleware\AdminAuth;

Route::get('/', [UserHomeController::class, 'execute']);
Route::get('/pets', [ListaHomeController::class, 'execute']);
Route::get('/pets/{id}', [AnimalHomeController::class, 'execute']);
Route::get('/quero-adotar', [QueroAdotarController::class, 'execute']);

Route::post('/quero-adotar', [AdocaoController::class, 'store'])->name('adocao.store');

Route::get('/quero-adotar/enviado', [EnviadoController::class, 'execute']);

// Admin routes
Route::get('/admin', [IndexController::class, 'execute'])->middleware(AdminAuth::class);
Route::get('/admin/login', [LoginController::class, 'execute']);
Route::post('/admin/loginPost', [LoginController::class, 'post']);
Route::get('/admin/logout', [LogoutController::class, 'execute'])->middleware(AdminAuth::class);
Route::get('/admin/cadastro', [CadastroController::class, 'execute'])->middleware(AdminAuth::class);
Route::post('/admin/cadastroPost', [CadastroController::class, 'post'])->middleware(AdminAuth::class);

Route::get('/admin/pets', [IndexController::class, 'execute'])->name('admin.pets.index')->middleware(AdminAuth::class);
Route::get('/admin/pets/add', [AddPetPostController::class, 'execute'])->middleware(AdminAuth::class);
Route::post('/admin/pets/add', [AddPetPostController::class, 'store'])->name('admin.pets.store')->middleware(AdminAuth::class);
Route::get('/admin/pets/edit/{id}', [AddPetController::class, 'execute'])->middleware(AdminAuth::class);
Route::get('/admin/forms', [formsController::class, 'execute'])->middleware(AdminAuth::class);
Route::get('/admin/forms/{id}', [AnaliseFormController::class, 'execute'])->middleware(AdminAuth::class);
Route::post('/admin/forms/{id}/status', [AnaliseFormController::class, 'updateStatus'])->name('adocao.updateStatus');


Route::fallback(function () {
    return view('user.erro404');
});