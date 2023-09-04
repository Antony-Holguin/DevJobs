<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\jobOpeningController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [jobOpeningController::class, 'index'])->middleware(['auth', 'verified','role.recruiter'])->name('jobOpenings.index');
Route::get('/jobOpenings/create', [jobOpeningController::class, 'create'])->middleware(['auth', 'verified'])->name('jobOpenings.create');
Route::get('/jobOpenings/{jobOpening}/edit}', [jobOpeningController::class, 'edit'])->middleware(['auth', 'verified'])->name('jobOpenings.edit');
Route::get('/jobOpenings/{jobOpening}', [jobOpeningController::class, 'show'])->name('jobOpenings.show');
Route::get('/Applicants/{jobOpening}', [ApplicantController::class, 'index'])->name('applicants.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Notifications
Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'role.recruiter'])->name('notifications');

require __DIR__.'/auth.php';
