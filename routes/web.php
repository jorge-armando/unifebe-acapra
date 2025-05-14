<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AddPetController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\ListaHomeController;

Route::get('/admin/home', [AdminHomeController::class, 'execute']);
Route::get('/admin/addpet', [AddPetController::class, 'execute']);
Route::get('/admin/forms', [formsController::class, 'execute']);
Route::get('/', [HomeController::class, 'execute']);

Route::get('user/queroAdotar', function () {
    return view('quero_adotar');
});

Route::get('admin/analiseFormulario', function () {
    return view('analise_formulario');
});

Route::get('user/enviado', function () {
    return view('enviado_sucesso');
});


Route::get('/user/home', [UserHomeController::class, 'mostrarTela']);
Route::get('/user/lista', [ListaHomeController::class, 'mostrarTela']);


