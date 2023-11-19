<?php

// app/Models/PatientInsurancePlan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PatientInsurancePlan extends Pivot
{
    use HasFactory;

    protected $table = 'patient_insurance_plan'; // Defina o nome da tabela associada ao modelo

    protected $fillable = ['contract_number', 'insurance_plan_id', 'patient_id'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
