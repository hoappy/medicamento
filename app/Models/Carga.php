<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_carga',
        'user_id',
        'medicamento_id'
    ];

    public function uses(){
        return $this->belongsToMany(User::class);
    }

    public function medicamentos(){
        return $this->belongsToMany(Medicamento::class);
    }

}
