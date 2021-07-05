<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busca extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_busqueda',
        'user_id',
        'medicamento_id'
    ];

    public function uses(){
        return $this->belongsToMany(User::class);
    }

    public function cliente(){
        return $this->belongsToMany(Cliente::class);
    }
}
