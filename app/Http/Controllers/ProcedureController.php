<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Procedure::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
        ]);

        // Cria uma nova consulta usando Eloquent
        $procedure = Procedure::create($request->all());

        // Retorna apenas os dados do paciente criado e o status
        return [
            'status' => 'success',
            'message' => 'Procedimento criado com sucesso!!',
            'data' => $procedure,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Procedure::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
        ]);

        $procedure = Procedure::findOrFail($id);
        $procedure->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Procedimento alterado com sucesso!!',
            'data' => $procedure,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $procedure = Procedure::findOrFail($id);
        $procedure->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Procedimento deletado com sucesso',
        ], 200);
    }
}
