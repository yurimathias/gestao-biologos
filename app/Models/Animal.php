<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';
    protected $fillable = ['nome_cientifico', 'nome_comum', 'descricao', 'area_id'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function relatorios()
    {
        return $this->belongsToMany(Relatorio::class, 'relatorio_animal');
    }
}
