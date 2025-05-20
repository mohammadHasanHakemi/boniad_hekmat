<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/doctors', [DoctorController::class,'index'])->name('doctors.index');
Route::get('/doctors/create', [DoctorController::class,'create'])->name('doctors.create');
Route::post('/doctors/store', [DoctorController::class,'store'])->name('doctors.store');
Route::get('/doctors/edit/{id}', [DoctorController::class,'edit'])->name('doctors.edit');
Route::post('/doctors/update/{id}', [DoctorController::class,'update'])->name('doctors.update');
Route::get('/doctors/destroy/{id}', [DoctorController::class,'confirm'])->name('doctors.destroy.confirm');
Route::post('/doctors/destroy/{id}', [DoctorController::class,'destrory'])->name('doctors.destroy');

Route::get('/drugs', function () {
    return view('drugs');
});
Route::get('/patients', function () {
    return view('patient.index');
});
