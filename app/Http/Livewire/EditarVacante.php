<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{

    use WithFileUploads;

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultima_dia;
    public $descripcion;
    public $imagen;
    public $nueva_imagen;


    protected $rules = [
        'titulo'      => 'required|string',
        'salario'     => 'required',
        'categoria'   => 'required',
        'empresa'     => 'required',
        'ultimo_dia'  => 'required',
        'descripcion' => 'required',
        'nueva_imagen' => 'nullable|image|max:4112',
    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria= $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }
    public function editarVacante()
    {
        $datos = $this->validate();

        //Si hay nueva imagen
        if ($this->nueva_imagen){
            $imagen = $this->nueva_imagen->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }
        //Encontrar la vacante que estamos editando
        $vacante = Vacante::find($this->vacante_id);
        //Asignar los datos
        $vacante->titulo=$datos['titulo'];
        $vacante->salario_id=$datos['salario'];
        $vacante->categoria_id=$datos['categoria'];
        $vacante->empresa=$datos['empresa'];
        $vacante->ultimo_dia=$datos['ultimo_dia'];
        $vacante->descripcion=$datos['descripcion'];
        $vacante->imagen=$datos['imagen'] ?? $vacante->imagen;
        $vacante->save();

        //Redireccionamos
        session()->flash('mensaje', 'Se ha actualizado correctamente');

        return redirect()->to('/dashboard');
    }

    public function render()
    {
        // Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
