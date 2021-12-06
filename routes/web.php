<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view', [AdminController::class,'addview']);

Route::post('/upload_doctor', [AdminController::class,'upload'])->name('upload');

Route::post('/appointment',[HomeController::class,'appointment'])->name('appointment');

Route::get('/myappointment', [HomeController::class,'myappointment'])->name('myappointment');

Route::get('/cancel_appoint/{id}', [HomeController::class,'cancel_appoint'])->name('cancel_appoint');


Route::get('/show_appointment', [AdminController::class,'show_appointment'])->name('show_appointment');

Route::get('/approved/{id}', [AdminController::class,'approved'])->name('approved');

Route::get('/cancel/{id}', [AdminController::class,'cancel'])->name('cancel');

Route::get('/showdoctor', [AdminController::class,'showdoctor'])->name('showdoctor');

Route::get('/delete_doctor/{id}', [AdminController::class,'delete_doctor'])->name('delete_doctor');

Route::get('/update_doctor/{id}', [AdminController::class,'update_doctor'])->name('update_doctor');

Route::post('/edit_doctor/{id}', [AdminController::class,'edit_doctor'])->name('edit_doctor');






