<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePlan extends Model
{
    use HasFactory;

    protected $table = 'insurance_plan'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['plan_descricao', 'plan_telefone'];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_insurance_plan')
        ->withPivot('contract_number');
    }
}
