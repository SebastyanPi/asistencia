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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/code-post', [App\Http\Controllers\AttendanceController::class, 'codePost'] )->name('code.post');

Route::get('/crear-asistencia', [App\Http\Controllers\AttendanceController::class, 'attendance'] )->middleware('checkCode')->name('register.view');
Route::get('/list-asistencia/V08UTQXI55ABHN6NJ2TW', [App\Http\Controllers\AttendanceController::class, 'attendance_list'] )->name('list.view');
Route::get('/edit-asistencia/V08UTQXI55ABHN6NJ2TW/{id_assist}', [App\Http\Controllers\AttendanceController::class, 'attendance_edit'] )->name('edit.view');
Route::post('/update-asistencia/V08UTQXI55ABHN6NJ2TW', [App\Http\Controllers\AttendanceController::class, 'attendance_update'] )->name('update.view');

Route::get('/asistencia/{id}', [App\Http\Controllers\AttendanceController::class, 'attendance_view'] )->name('view.attendance');

Route::get('/asistencia/complete/{id}', [App\Http\Controllers\AttendanceController::class, 'attendance_complete'] )->name('complete.attendance');

Route::get('/asistencia/complete/details/{id}', [App\Http\Controllers\AttendanceController::class, 'attendance_complete_details'] )->name('complete.attendance.details');

Route::post('/asistencia/complete/save', [App\Http\Controllers\AttendanceController::class, 'attendance_complete_post'] )->name('complete.attendance.post');

Route::post('/crear-asistencia/post', [App\Http\Controllers\AttendanceController::class, 'registerAttendance'] )->name('register.post');

Route::get('/generateCode', [App\Http\Controllers\AttendanceController::class, 'qr_code'] )->name('qr.generate');

Route::get('/generate/attendance/{id}', [App\Http\Controllers\AttendanceController::class, 'generatePDF'] )->name('pdf.generate');
