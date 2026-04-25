<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin routes

Route::middleware(['auth','verified','role:admin'])->group(function () {
Route::controller(App\Http\Controllers\Admin\IndexController::class)->group(function () {
Route::prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin.index');

});
});
});








//reception routes
Route::middleware(['auth','verified','role:reception'])->group(function () {
Route::controller(App\Http\Controllers\Reception\IndexController::class)->group(function () {
Route::prefix('reception')->group(function () {
    Route::get('/', 'index')->name('reception.index');

});
});
});



///patient routes
Route::middleware(['auth','verified','role:patient'])->group(function () {
Route::controller(App\Http\Controllers\Patient\IndexController::class)->group(function () {
Route::prefix('patient')->group(function () {
    Route::get('/', 'index')->name('patient.index');

});
});
});

require __DIR__.'/auth.php';
