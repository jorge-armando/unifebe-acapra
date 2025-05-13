<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AddPetController;
use App\Http\Controllers\Admin\FormsController;

Route::get('/admin/home', [AdminHomeController::class, 'execute']);
Route::get('/admin/addpet', [AddPetController::class, 'execute']);
Route::get('/admin/forms', [formsController::class, 'execute']);
Route::get('/', [HomeController::class, 'execute']);
Route::get('/queroAdotar', function () {
    return view('quero_adotar');
});
