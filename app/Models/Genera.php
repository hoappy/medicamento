<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genera extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_reporte',
        'user_id',
        'reporte_id'
    ];

    public function uses(){
        return $this->belongsToMany(User::class);
    }

    public function reportes(){
        return $this->belongsToMany(Reporte::class);
    }

}
