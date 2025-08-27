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
use App\Http\Controllers\PetController;
use App\Http\Middleware\AdminAuth;

Route::get('/', [UserHomeController::class, 'execute']);
Route::get('/pets', [ListaHomeController::class, 'execute']);
Route::get('/pets/{id}', [PetController::class, 'show'])->name('pets.show');
Route::get('/quero-adotar/{id}', [AdocaoController::class, 'create'])->name('quero_adotar');
Route::post('/quero-adotar', [AdocaoController::class, 'store'])->name('adocao.store');
Route::get('/enviado', [EnviadoController::class, 'execute']);
Route::get('/admin', [IndexController::class, 'execute'])->middleware(AdminAuth::class);
Route::get('/admin/login', [LoginController::class, 'execute']);
Route::post('/admin/loginPost', [LoginController::class, 'post']);
Route::get('/admin/logout', [LogoutController::class, 'execute'])->middleware(AdminAuth::class);
Route::get('/admin/cadastro', [CadastroController::class, 'execute'])->middleware(AdminAuth::class);
Route::post('/admin/cadastroPost', [CadastroController::class, 'post'])->middleware(AdminAuth::class);
Route::get('/admin/pets', [IndexController::class, 'execute'])->name('admin.pets.index')->middleware(AdminAuth::class);
Route::get('/admin/pets/add', [AddPetPostController::class, 'execute'])->middleware(AdminAuth::class);
Route::post('/admin/pets/add', [AddPetPostController::class, 'store'])->name('admin.pets.store')->middleware(AdminAuth::class);
Route::get('/admin/pets/edit/{id}', [AddPetController::class, 'execute'])->name('admin.pets.edit')->middleware(AdminAuth::class);
Route::get('/admin/forms/{id}', [AnaliseFormController::class, 'execute'])->middleware(AdminAuth::class);
Route::post('/admin/forms/{id}/status', [AnaliseFormController::class, 'updateStatus'])->name('adocao.updateStatus');
Route::delete('/admin/pets/{id}', [AddPetPostController::class, 'destroy'])->name('admin.pets.destroy')->middleware(AdminAuth::class);
Route::post('/admin/pets/edit/{id}', [AddPetPostController::class, 'update'])->name('admin.pets.update')->middleware(AdminAuth::class);
Route::get('/admin/forms', [FormsController::class, 'execute'])->name('admin.forms')->middleware(AdminAuth::class);
Route::get('/admin/forms/{id}/aprovar', [FormsController::class, 'aprovar'])->name('admin.forms.aprovar')->middleware(AdminAuth::class);
Route::get('/admin/forms/{id}/reprovar', [FormsController::class, 'reprovar'])->name('admin.forms.reprovar')->middleware(AdminAuth::class);
Route::get('/admin/forms/{id}', [FormsController::class, 'show'])->name('admin.forms.show')->middleware(AdminAuth::class);
Route::post('/admin/forms/{id}/aprovar', [FormsController::class, 'aprovar'])->name('admin.forms.aprovar')->middleware(AdminAuth::class);
Route::post('/admin/forms/{id}/reprovar', [FormsController::class, 'reprovar'])->name('admin.forms.reprovar')->middleware(AdminAuth::class);

Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/forms', [FormsController::class, 'execute'])->name('admin.forms');
    Route::get('/admin/forms/{id}', [FormsController::class, 'show'])->name('admin.forms.show');
    Route::get('/admin/forms/{id}/aprovar', [FormsController::class, 'aprovar'])->name('admin.forms.aprovar');
    Route::get('/admin/forms/{id}/reprovar', [FormsController::class, 'reprovar'])->name('admin.forms.reprovar');
});

Route::fallback(function () {
    return view('user.erro404');
});


