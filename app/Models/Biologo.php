<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biologo extends Model
{
    use HasFactory;

    protected $table = 'biologos';
    protected $fillable = ['nome', 'especialidade', 'data_nascimento'];

    public function areasResponsavel()
    {
        return $this->hasMany(Area::class, 'responsavel_id');
    }

    public function relatorios()
    {
        return $this->hasMany(Relatorio::class, 'biologo_id');
    }
}
