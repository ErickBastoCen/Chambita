<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;


    // Reglas de validacion
    // debe de tener el mismo nombre con wire:model
    protected $rules = [
        'titulo'      => 'required|string',
        'salario'     => 'required',
        'categoria'   => 'required',
        'empresa'     => 'required',
        'ultimo_dia'  => 'required',
        'descripcion' => 'required',
        'imagen'      => 'required|image|max:4112',
    ];

    // definir la funcion declarada en el archivo blade con wire:submit.prevent='crearVacante'
    public function crearVacante()
    {
        // validate() aplica $rules definidas 
        // si todo esta bien el formulario se asigna a una variable $datos
        $datos = $this->validate();

        //creamos vacante 
        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);
        //dd($nombre_imagen);

        //creamos la vacante
        Vacante::create([
            'titulo'=> $datos['titulo'],
            'salario_id'=> $datos['salario'],
            'categoria_id'=> $datos['categoria'],
            'empresa'=> $datos['empresa'],
            'ultimo_dia'=> $datos['ultimo_dia'],
            'descripcion'=> $datos['descripcion'],
            'imagen'=> $nombre_imagen,
            'user_id'=> auth()->user()->id,
        ]);
        //mostramos un mensaje y redireccionamos al usuario
        session()->flash('mensaje', 'Se ha publicado correctamente');

        return redirect()->to('/dashboard');

    }

    public function render()
    {
        // Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}