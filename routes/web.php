<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\TechnicianController;

use App\Exports\ComplaintsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/export-complaints/{month?}', function ($month = null) {
    return Excel::download(new ComplaintsExport($month), 'complaints_' . ($month ?: date('Y-m')) . '.xlsx');
})->name('export.complaints');


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [App\Http\Controllers\ComplaintController::class, 'index'])->name('dashboard');
Route::resource('complaints', App\Http\Controllers\ComplaintController::class);
Route::resource('technicians', App\Http\Controllers\TechnicianController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
