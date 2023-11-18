<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $table = 'procedure'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['nome', 'valor'];
}
