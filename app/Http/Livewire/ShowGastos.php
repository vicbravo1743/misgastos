<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gasto;
use App\Models\Fondo;
use Livewire\WithPagination;

class ShowGastos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'descripcion'   => 'required',
        'cantidad'  => 'required|numeric',
        'tipo'  => 'required',
        'necesario' => 'required',
        'iva'   => 'required',
        'user_id' => 'required'
    ];

    protected $messages = [
        'descripcion.required' => 'La descripción es requerida',
        'cantidad.required' => 'La cantidad es requerida',
        'cantidad.numeric'  => 'La cantidad debe ser solo numeros',
        'tipo.required' => 'La cuenta del gasto es requerida',
        'necesario.required'  => 'Define si el gasto es necesario o no',
    ];

    public $tipoSearch, $necesarioSearch;
    public $queryString = ['tipoSearch', 'necesarioSearch'];

    public $descripcion, $cantidad, $tipo, $iva, $necesario, $user_id, $checked;

    public function render()
    {
        return view('livewire.gastos.show-gastos', [
            'gastos'    => Gasto::orderBy('id', 'desc')
                                ->where('user_id', \Auth::user()->id)
                                ->tipo($this->tipoSearch)
                                ->necesario($this->necesarioSearch)
                                ->paginate(10)
        ]);
    }

    public function index(){
        return view('livewire.gastos.index');
    }

    public function compararGastoConFondo($tipo, $cantidad){

        switch($tipo) {
            case "EFECTIVO":
                if($cantidad > \Auth::user()->fondos->efectivo) {
                    session()->flash('message_error', 'Error! La cantidad del gasto es mayor a la disponible');
                    return false;
                }else {
                    $fondo = Fondo::find(\Auth::user()->fondos->id);
                    $fondo->efectivo = $fondo->efectivo - $cantidad;
                    $fondo->save();
                    return true;
                }
            break;

            case "DEBITO": 
                if($cantidad > \Auth::user()->fondos->debito) {
                    session()->flash('message_error', 'Error! La cantidad del gasto es mayor a la disponible');
                    return false;
                }else {
                    $fondo = Fondo::find(\Auth::user()->fondos->id);
                    $fondo->debito = $fondo->debito - $cantidad;
                    $fondo->save();
                    return true;
                }
            break;

            case "CREDITO":
                if($cantidad > \Auth::user()->fondos->credito) {
                    session()->flash('message_error', 'Error! La cantidad del gasto es mayor a la disponible');
                    return false;
                }else {
                    $fondo = Fondo::find(\Auth::user()->fondos->id);
                    $fondo->credito = $fondo->credito - $cantidad;
                    $fondo->save();
                    return true;
                }
            break;
        }
    }

    public function store(){

        $continuar = $this->compararGastoConFondo($this->tipo, $this->cantidad);

        if($continuar === true) {
            $this->iva = $this->cantidad * 0.16;
            $this->user_id = \Auth::user()->id;
            $validatedData = $this->validate();

            Gasto::create($validatedData);

            session()->flash('message_success', 'Gasto creado correctamente!');
        }
    }
}
