<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsurancePlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\SpecialtyController;

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

Route::get('/', [HomeController::class,'index'])->name('home');

// Usuario
Route::resource('users', UserController::class);

// Paciente
Route::resource('patient', PatientController::class);

// Plano de Saude
Route::resource('insurance-plan', InsurancePlanController::class);

// Consulta
Route::resource('appointment', AppointmentController::class);


// Procedimento
Route::resource('procedure', ProcedureController::class);

// Médico
Route::resource('doctor', DoctorController::class);

// Especialidade
Route::resource('specialty', SpecialtyController::class);




