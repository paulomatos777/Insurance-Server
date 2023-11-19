<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;


    protected $table = 'specialty'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['nome'];

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
