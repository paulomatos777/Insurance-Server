<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Appointment::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'hora' => 'required',
            'data' => 'required|date',
            'particular' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
        ]);

        // Cria uma nova consulta usando Eloquent
        $appointment = Appointment::create($request->all());

        // Retorna apenas os dados do paciente criado e o status
        return [
            'status' => 'success',
            'message' => 'Consulta criada com sucesso!!',
            'data' => $appointment,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Appointment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hora',
            'data' => 'date',
            'particular',
            'patient_id',
            'doctor_id',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Consulta alterada com sucesso!!',
            'data' => $appointment,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Consulta deletada com sucesso',
        ], 200);
    }
}
