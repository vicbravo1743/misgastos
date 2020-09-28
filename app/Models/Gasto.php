<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gasto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'descripcion',
        'cantidad',
        'iva',
        'tipo',
        'necesario',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTipo($query, $tipo){
        if ($tipo)
            return $query->where('tipo', $tipo);
    }

    public function scopeNecesario($query, $necesario){
        if($necesario)
            return $query->where('necesario', $necesario);
    }
}
