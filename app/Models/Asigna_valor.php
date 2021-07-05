<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asigna_valor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_asigna',
        'valor',
        'user_id',
        'medicamento_id',
        'cantidad'
    ];

    public function uses(){
        return $this->belongsToMany(User::class);
    }

    public function medicamentos(){
        return $this->belongsToMany(Medicamento::class);
    }

}
