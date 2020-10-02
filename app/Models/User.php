<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Gasto;
use Carbon\Carbon;  

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }

    public function reportesGastos()
    {
        return $this->hasMany(GastosReport::class);
    }

    public function fondos()
    {
        return $this->hasOne(Fondo::class);
    }

    public function scopeId($query, $id){
        if ($id)
            return $query->where('id', $id);
    }

    public function gastosDiarios() {
        $diaActual = Carbon::now();

        return Gasto::where('user_id' ,\Auth::user()->id)
                    ->whereDate('created_at', $diaActual)
                    ->sum('cantidad');

    }

    public function gastosMensuales(){
        $mesActual = Carbon::now()->format('m');

        return Gasto::where('user_id' ,\Auth::user()->id)
                    ->whereMonth('created_at', $mesActual)
                    ->get()
                    ->sum('cantidad');
    }

    public function gastosTotales(){
        return Gasto::where('user_id',  \Auth::user()->id)->sum('cantidad');
    }

    public function gastosSemanales(){
        $primerDiaSemana = Carbon::now()->startOfWeek()->format('Y-m-d');
        $ultimoDiaSemana = Carbon::now()->endOfWeek()->format('Y-m-d');

        return Gasto::where('user_id', \Auth::user()->id)
                        ->whereBetween('created_at', [$primerDiaSemana, $ultimoDiaSemana])
                        ->sum('cantidad');
    }
}
