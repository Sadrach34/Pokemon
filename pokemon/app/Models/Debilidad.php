<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo;

class Debilidad extends Model
{
    use HasFactory;

    protected $table = 'debilidades';

    protected $fillable = [
        'id',
        'tipo_id',
        'debilidad',
    ];
    
    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function tipoDebilidad(){
        return $this->belongsTo(Tipo::class, 'debilidad');
    }
}
