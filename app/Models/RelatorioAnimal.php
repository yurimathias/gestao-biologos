<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatorioAnimal extends Model
{
    use HasFactory;

    protected $table = 'relatorio_animal';
    protected $fillable = ['relatorio_id', 'animal_id'];
}
