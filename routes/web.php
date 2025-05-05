<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SkillController;

// Homepage (opsional, bisa arahkan ke dashboard atau welcome)
Route::get('/', function () {
    return view('welcome');
});

// Companies CRUD
Route::resource('companies', CompanyController::class);

// Employees CRUD
Route::resource('employees', EmployeeController::class);

// Skills CRUD
Route::resource('skills', SkillController::class);
