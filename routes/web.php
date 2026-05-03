<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});


/*
|-----------------------------------
| Dashboard Redirect By Role
|-----------------------------------
*/
Route::get('/dashboard', function () {

    $role = auth()->user()->role;

    if ($role == 'admin') {
        return redirect()->route('admin.index');
    }

    if ($role == 'reception') {
        return redirect()->route('reception.index');
    }

    if ($role == 'patient') {
        return redirect()->route('patient.index');
    }

    return redirect('/login');

})->middleware('auth')->name('dashboard');


/*
|-----------------------------------
| Profile
|-----------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


/*
|-----------------------------------
| Admin
|-----------------------------------
*/
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
Route::controller(App\Http\Controllers\Admin\IndexController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'index')
            ->name('admin.index');
    });
});
});

// admin users controller
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/user/manage', 'manageUsers') ->name('admin.users.manage');
        Route::get('/user/edit/{id}', 'editUser') ->name('admin.users.edit');
        Route::put('/user/update/{id}', 'updateUser') ->name('admin.users.update');
        Route::get('/user/delete/{id}', 'deleteUser') ->name('admin.users.delete');
    });
});
});


/// admin departments controller
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
Route::controller(App\Http\Controllers\Admin\DepartemntController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/department/create', 'createDapartment') ->name('admin.departments.create');
        Route::get('/department/manage', 'manageDepartments') ->name('admin.departments.manage');
        Route::post('/department/store', 'storeDapartment') ->name('admin.departments.store');
        Route::get('/department/edit/{id}', 'editDepartment') ->name('admin.departments.edit');
        Route::put('/department/update/{id}', 'updateDepartment') ->name('admin.departments.update');
        Route::get('/department/delete/{id}', 'deleteDepartment') ->name('admin.departments.delete');
    });
});
});


/// admin doctors controller
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
Route::controller(App\Http\Controllers\Admin\DoctorController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/doctor/create', 'createDoctor') ->name('admin.doctors.create');
        Route::get('/doctor/manage', 'manageDoctors') ->name('admin.doctors.manage');
        Route::get('/doctor/edit/{id}', 'editDoctor') ->name('admin.doctors.edit');
        Route::post('/doctor/store', 'storeDoctor') ->name('admin.doctors.store');
        Route::put('/doctor/update/{id}', 'updateDoctor') ->name('admin.doctors.update');
        Route::get('/doctor/delete/{id}', 'deleteDoctor') ->name('admin.doctors.delete');
    });
});
});


/*
|-----------------------------------
| Reception
|-----------------------------------
*/
Route::middleware(['auth','role:reception'])->prefix('reception')->group(function () {
Route::controller(App\Http\Controllers\Reception\IndexController::class)->group(function () {
    Route::prefix('reception')->group(function () {
        Route::get('/', 'index')
            ->name('reception.index');
    });
});
});


/*
|-----------------------------------
| Patient
|-----------------------------------
*/
Route::middleware(['auth','role:patient'])->prefix('patient')->group(function () {
Route::controller('App\Http\Controllers\Patient\IndexController')->group(function () {
    Route::prefix('patient')->group(function () {
        Route::get('/', 'index')
            ->name('patient.index');
    });
});
});


require __DIR__.'/auth.php';
