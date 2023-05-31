<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacante extends Component
{

    public $termino;
    public $salario;

    protected $listeners = [
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($termino, $salario)

    {
        $this->termino = $termino;
        $this->salario = $salario;
    }

    public function render()
    {
        $vacantes = Vacante::when($this->termino, function ($query) {
            $query->where('titulo', 'LIKE', '%' . $this->termino . "%");
        })
        ->when($this->termino, function($query){
            $query->orWhere('empresa', 'LIKE', '%' . $this->termino . "%");
        })
        ->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);
        })
        ->paginate(5);

        return view('livewire.home-vacante', [
            'vacantes' => $vacantes
        ]);
    }
}