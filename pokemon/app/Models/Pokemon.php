<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = ['id', 'nombre', 'primary', 'secondary', 'region', 'created_at', 'status'];
}