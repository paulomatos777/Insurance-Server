<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['data', 'hora', 'particular'];
}
