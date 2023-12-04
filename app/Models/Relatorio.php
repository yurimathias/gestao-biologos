<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;

    protected $table = 'relatorios';
    protected $fillable = ['biologo_id', 'area_id', 'observacoes'];

    public function biologo()
    {
        return $this->belongsTo(Biologo::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function plantas()
    {
        return $this->belongsToMany(Planta::class, 'relatorio_planta')->withTimestamps();
    }

    public function animais()
    {
        return $this->belongsToMany(Animal::class, 'relatorio_animal')->withTimestamps();
    }
}
