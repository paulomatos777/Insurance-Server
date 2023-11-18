<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Specialty::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        // Cria uma nova consulta usando Eloquent
        $specialty = Specialty::create($request->all());

        // Retorna apenas os dados do paciente criado e o status
        return [
            'status' => 'success',
            'message' => 'Especialidade criada com sucesso!!',
            'data' => $specialty,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Specialty::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        $specialty = Specialty::findOrFail($id);
        $specialty->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Especialidade alterada com sucesso!!',
            'data' => $specialty,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Especialidade deletada com sucesso',
        ], 200);
    }
}
