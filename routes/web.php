<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::redirect('/', '/login');

Auth::routes();

// Protected Routes (Requires Authentication)
Route::middleware('auth')->group(function () {
    // Home Routes
    Route::resource('home', HomeController::class);
    // Companies Routes
    Route::resource('companies', CompanyController::class);
    // Employees Routes
    Route::resource('employees', EmployeeController::class);
});
