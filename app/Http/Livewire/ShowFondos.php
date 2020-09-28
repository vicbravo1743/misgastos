<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fondo;

class ShowFondos extends Component
{

    public $debito, $credito, $efectivo;
    public $debitoActual, $creditoActual, $efectivoActual;

    public function mount(){
        $user = \Auth::user();
        $this->debitoActual = $user->fondos->debito;
        $this->creditoActual = $user->fondos->credito;
        $this->efectivoActual = $user->fondos->efectivo;
    }

    public function agregarEfectivo(){
        $fondo = Fondo::findOrFail(\Auth::user()->fondos->id);
        $fondo->efectivo = $fondo->efectivo + $this->efectivo;
        $fondo->save();
        $this->efectivoActual = $fondo->efectivo;
        $this->reset('efectivo');
    }

    public function agregarCredito(){
        $fondo = Fondo::findOrFail(\Auth::user()->fondos->id);
        $fondo->credito = $fondo->credito + $this->credito;
        $fondo->save();
        $this->creditoActual = $fondo->credito;
        $this->reset('credito');
    }

    public function agregarDebito(){
        $fondo = Fondo::findOrFail(\Auth::user()->fondos->id);
        $fondo->debito = $fondo->debito + $this->debito;
        $fondo->save();
        $this->debitoActual = $fondo->debito;
        $this->reset('debito');
    }

    public function render()
    {
        return view('livewire.fondos.show-fondos');
    }

    public function index()
    {
        return view('livewire.fondos.index');
    }
}
