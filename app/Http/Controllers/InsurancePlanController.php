<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InsurancePlan;

class InsurancePlanController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return InsurancePlan::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_descricao' => 'required',
            'plan_telefone' => 'required',
        ]);

        // Cria um novo plano de saude usando Eloquent
        $plan = InsurancePlan::create($request->all());

        // Retorna apenas os dados do plano criado e o status
        return [
            'status' => 'success',
            'message' => 'Plano criado com sucesso !!',
            'data' => $plan,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return InsurancePlan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'plan_descricao' => 'required',
            'plan_telefone' => 'required',
        ]);

        $plan = InsurancePlan::findOrFail($id);
        $plan->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'plano alterado com sucesso!!',
            'data' => $plan,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = InsurancePlan::findOrFail($id);
        $patient->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Plano deletado com sucesso!!',
        ], 200);
    }
}
