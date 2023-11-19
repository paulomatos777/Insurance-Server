<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['data', 'hora', 'particular', 'patient_id', 'doctor_id', 'patient_insurance_plan_id'];

    public function patient()
    {
      return $this->belongsTo(Patient::class);
    }

    public function procedures()
    {
        return $this->hasMany(Procedure::class);
    }

    public function doctor()
    {
      return $this->belongsTo(Doctor::class);
    }

     // Relacionamento com vinculo (0,1)
     public function patientInsurancePlan()
     {
         return $this->hasOne(PatientInsurancePlan::class);
     }
}
