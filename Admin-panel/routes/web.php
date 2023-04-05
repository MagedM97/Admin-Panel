<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



/**
* Home page route.
*/
Route::get('/', function () {
    return view('welcome');
});

/**
* User dashboard routes
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


   /**
     * Admin panel routes.
     */
Route::middleware('auth')->prefix('/admin')->group (function () {

    Route::get('', [AdminController::class,'admin_view'])->name('home');
    Route::get('/employees', [EmployeeController::class,'employees_view'])->name('employees');
    Route::get('/companies', [CompanyController::class,'companies_view'])->name('companies');
    Route::get('/employees/create', [EmployeeController::class, 'create']);
    Route::get('/companies/create', [CompanyController::class, 'create']);
    Route::post('/employees', [EmployeeController::class, 'store']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::get('/company/{id}/edit', [CompanyController::class, 'edit']);
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit']);
    Route::patch('/company/{id}', [CompanyController::class, 'update']);
    Route::patch('/employee/{id}', [EmployeeController::class, 'update']);
    Route::delete('/companies/{id}/', [CompanyController::class, 'delete']);
    Route::delete('/employees/{id}/', [EmployeeController::class, 'delete']);
});

require __DIR__.'/auth.php';
