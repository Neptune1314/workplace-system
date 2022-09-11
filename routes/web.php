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


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');
//jobs
Route::get('/', [App\Http\Controllers\JobController::class, 'index'])->name('job.index');
Route::get('/jobs/create', [App\Http\Controllers\JobController::class, 'create'])->middleware(['auth', 'verified'])->name('jobs.create');
Route::post('/jobs/store', [App\Http\Controllers\JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{id}/{job}', [App\Http\Controllers\JobController::class, 'show'])->middleware(['auth', 'verified'])->name('jobs.show');

Route::get('/jobs/{id}/{job}/editmyjob', [App\Http\Controllers\JobController::class, 'edit'])->name('jobs.edit');
Route::post('/jobs/{id}/editmyjob', [App\Http\Controllers\JobController::class, 'update'])->name('jobs.update');
Route::get('/jobs/myjob', [App\Http\Controllers\JobController::class, 'myjob'])->middleware(['auth', 'verified'])->name('myjob');
Route::post('/applications/{id}', [App\Http\Controllers\JobController::class, 'apply'])->name('apply');
Route::get('/jobs/applicantions', [App\Http\Controllers\JobController::class, 'applicants'])->middleware(['auth', 'verified'])->name('applicants');
Route::get('/jobs/alljobs', [App\Http\Controllers\JobController::class, 'alljobs'])->name('alljobs');

//Таалагдсан ажлын байрыг тэмдэглэх.
Route::post('/jobs/save/{id}', [App\Http\Controllers\FavouriteController::class, 'savejob'])->name('savejob');
Route::post('/jobs/unsave/{id}', [App\Http\Controllers\FavouriteController::class, 'unsavejob'])->name('unsavejob');

//Search
Route::get('/jobs/search', [App\Http\Controllers\JobController::class, 'searchjob'])->name('searchjob');

//Company
Route::get('/company/{id}/{company}', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->middleware(['auth', 'verified'])->name('company.create');

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
