<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    public $termino;
    public $salario;

    public function leerDatosFormulario()
    {
        
        $this->emit('terminosBusqueda', $this->termino, $this->salario);
    }

    public function render()
    {
        $salarios = Salario::all();

        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
        ]);
    }
}