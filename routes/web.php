<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', [App\Http\Controllers\JobController::class, 'index'])->name('job.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//jobs
Route::get('/jobs/{id}/{job}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');

//Company
Route::get('/company/{id}/{company}', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('company/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::post('company/coverphoto', [App\Http\Controllers\CompanyController::class, 'coverphoto'])->name('company.coverphoto');
Route::post('company/logo', [App\Http\Controllers\CompanyController::class, 'logo'])->name('company.logo');

//User
Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'index'])->name('user.profile');
Route::post('/user/profile/create', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
Route::post('/user/profile/coverletter', [App\Http\Controllers\UserController::class, 'coverletter'])->name('user.profile.coverletter');
Route::post('/user/profile/resume', [App\Http\Controllers\UserController::class, 'resume'])->name('user.profile.resume');
Route::post('/user/profile/avatar', [App\Http\Controllers\UserController::class, 'avatar'])->name('user.profile.avatar');

//Employer
Route::view('/employer/register', 'auth.employer-register')->name('employer.create');
Route::post('/employer/register', [App\Http\Controllers\EmployerRegisterController::class, 'store'])->name('employer.register');
