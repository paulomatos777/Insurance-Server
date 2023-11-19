<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;


    protected $table = 'doctor'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['nome', 'crm', 'specialty_id'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function specialty()
    {
      return $this->belongsTo(Specialty::class);
    }
}
