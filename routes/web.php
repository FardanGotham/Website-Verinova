<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\Admin\OrganizationController as AdminOrganizationController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\ClassInfoController;
use App\Http\Controllers\Admin\DutyScheduleController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/jadwal', [ScheduleController::class,'index'])
    ->name('schedule');
Route::get('/', [HomeController::class, 'index']);
// Halaman Profil Kelas
Route::get('/profil', [ProfileController::class, 'index'])
    ->name('profile');

// Halaman Struktur Organisasi
//Route::get('/struktur-organisasi', [OrganizationController::class, 'index'])
    //->name('organization');
// Halaman publik
Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])
    ->name('students.show');

// Halaman yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/students', [AdminStudentController::class, 'index'])
        ->name('admin.students.index');

    Route::resource('admin/students', AdminStudentController::class)
        ->except(['index'])
        ->names('admin.students');
    Route::resource('admins', AdminController::class);


    Route::resource('organizations', AdminOrganizationController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('achievements', AdminAchievementController::class);
    Route::resource('class-infos', ClassInfoController::class);
    Route::resource('duty-schedules',DutyScheduleController::class);

});

require __DIR__.'/auth.php';