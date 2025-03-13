<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = ['id', 'nombre', 'id_tipo1', 'id_tipo2', 'created_at'];
}