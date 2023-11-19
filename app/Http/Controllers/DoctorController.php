<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Doctor::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'crm' => 'required',
            'specialty_id' => 'required'
        ]);

        // Cria uma nova consulta usando Eloquent
        $doctor = Doctor::create($request->all());

        // Retorna apenas os dados do paciente criado e o status
        return [
            'status' => 'success',
            'message' => 'Médico criado com sucesso!!',
            'data' => $doctor,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Doctor::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome',
            'crm',
            'specialty_id'
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Médico alterado com sucesso!!',
            'data' => $doctor,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Médico deletado com sucesso',
        ], 200);
    }
}
