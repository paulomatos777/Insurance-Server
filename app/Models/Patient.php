<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patient'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['nome', 'nascimento', 'codigo', 'telefone'];

    protected $dates = ['nascimento']; // Converte automaticamente o campo 'nascimento' para um objeto Carbon

    public function insurancePlans()
    {
        return $this->belongsToMany(InsurancePlan::class, 'patient_insurance_plan')
            ->withPivot('contract_number');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
