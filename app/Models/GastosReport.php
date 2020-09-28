<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastosReport extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'gastos_id', 'total_gastos', 'total_necesario', 'total_innecesario', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
