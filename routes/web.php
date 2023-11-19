<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsurancePlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientInsurancePlanController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\SpecialtyController;
use Illuminate\Http\Request;

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

/** open route to store an account */
// Route::post('users', [UserController::class, 'store']);

/*como não foi implementado o gernecimaneto
  de token e controle de autenticação
, deixei essas rotas em aberto para teste do crud no front*/
Route::resource('users', UserController::class);

/** protected group routes */
Route::group(['middleware' => ['api']], function () {

    Route::group(['middleware' => 'jwt.auth'], function () {

        // Route::get('users', [UserController::class, 'index']);

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

        // Vínculo Plano e Paciente
        Route::resource('patient-insurance', PatientInsurancePlanController::class);

    });

});

/** login route */
Route::post('/login', function (Request $request) {
    $credentials = $request->only(['email', 'password']);

    if (!$token = auth()->attempt($credentials)) {
        abort(401, 'Sem autorização');
    }

    // Obter o usuário autenticado
    $user = auth()->user();

    return response()->json([
        'data' => [
            'user' => $user,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ],
    ]);
});





