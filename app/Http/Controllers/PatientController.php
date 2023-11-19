<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Patient::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'nascimento' => 'required|date',
            'telefone' => 'required',
            // Add other validation rules as needed
        ]);

        // Gera um código único usando UUID
        $codigoUnico = Str::uuid();

        // Adiciona o código único ao request antes de criar o paciente
        $request->merge(['codigo' => $codigoUnico]);

        // Cria um novo paciente usando Eloquent
        $patient = Patient::create($request->all());

        // Retorna apenas os dados do paciente criado e o status
        return [
            'status' => 'success',
            'message' => 'Patient created successfully',
            'data' => $patient,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Patient::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome',
            'nascimento' => 'date',
            'telefone'
            // Add other validation rules as needed
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Patient updated successfully',
            'data' => $patient,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Patient deleted successfully',
        ], 200);
    }
}
