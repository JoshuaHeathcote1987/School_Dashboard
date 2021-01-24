<?php

use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\FeeController;
use App\Http\Controllers\Dashboard\GradeController;
use App\Http\Controllers\Dashboard\InjuryController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\TimetableController;
use App\Http\Controllers\Dashboard\AttendanceController;
use App\Http\Controllers\Dashboard\ChartController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CustodialController;
use App\Http\Controllers\Dashboard\StudentController;

use App\Http\Controllers\Tools\MailController;

use App\Http\Controllers\Tools\MessageController;
use App\Http\Controllers\Tools\MessageAlertController;


Auth::routes();

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::prefix('dashboard')->group(function () 
{
    Route::get('home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

    Route::resource('user',         UserController::class);
    Route::resource('fee',          FeeController::class);
    Route::resource('grade',        GradeController::class);
    Route::resource('injury',       InjuryController::class);
    Route::resource('payment',      PaymentController::class);
    Route::resource('report',       ReportController::class);
    Route::resource('subject',      SubjectController::class);
    Route::resource('timetable',    TimetableController::class);
    Route::resource('attendance',   AttendanceController::class);
    Route::resource('permission',   PermissionController::class);
    Route::resource('role',         RoleController::class);

    Route::resource('message',     MessageController::class);

    Route::resource('image',        ImageController::class);
    
    Route::resource('admin',        AdminController::class);
    Route::resource('parent',       CustodialController::class);
    Route::resource('student',      StudentController::class);
});

// Mail Routes
Route::get('/account-create-email', [MailController::class, 'accountCreated'])->name('account-create-email');
Route::post('/private-email', [MailController::class, 'sendPrivate'])->name('private-email');
Route::get('/get-email', [MailController::class, 'getMail'])->name('get-email');


// Alert Center Routes
Route::get('message-alert', [MessageAlertController::class, 'index'])->name('message-alert');