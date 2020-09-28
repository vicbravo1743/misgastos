<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    use HasFactory;

    protected $fillable = ['debito', 'credito', 'efectivo', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
