<?php

namespace App\Http\Controllers;

use App\Models\PatientInsurancePlan;
use Illuminate\Http\Request;

class PatientInsurancePlanController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PatientInsurancePlan::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_number' => 'required',
            'insurance_plan_id',
            'patient_id'
        ]);

        // Cria uma nova consulta usando Eloquent
        $patient_insurance_plan = PatientInsurancePlan::create($request->all());

        // Retorna apenas os dados do paciente criado e o status
        return [
            'status' => 'success',
            'message' => 'Vínculo criado com sucesso!!',
            'data' => $patient_insurance_plan,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return PatientInsurancePlan::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contract_number',
            'insurance_plan_id',
            'patient_id'
        ]);

        $patient_insurance_plan = PatientInsurancePlan::findOrFail($id);
        $patient_insurance_plan->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Vínculo alterado com sucesso!!',
            'data' => $patient_insurance_plan,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient_insurance_plan = PatientInsurancePlan::findOrFail($id);
        $patient_insurance_plan->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Vínculo deletado com sucesso',
        ], 200);
    }
}
