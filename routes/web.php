<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AddPetController;
use App\Http\Controllers\Admin\FormsController;

Route::get('/admin/home', [HomeController::class, 'mostrarTela']);
Route::get('/admin/addpet', [AddPetController::class, 'mostrarTela']);
Route::get('/admin/forms', [formsController::class, 'mostrarTela']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/queroAdotar', function () {
    return view('quero_adotar');
});
