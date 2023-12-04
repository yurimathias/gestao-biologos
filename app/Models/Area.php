<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $fillable = ['nome', 'descricao', 'responsavel_id'];

    public function responsavel()
    {
        return $this->belongsTo(Biologo::class, 'responsavel_id');
    }

    public function plantas()
    {
        return $this->hasMany(Planta::class);
    }

    public function animais()
    {
        return $this->hasMany(Animal::class);
    }

    public function relatorios()
    {
        return $this->hasMany(Relatorio::class);
    }
}
