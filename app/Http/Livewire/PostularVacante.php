<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules =[
        'cv' =>'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this -> vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //guardamos cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //validamos
        $this ->vacante->candidatos()->create([
            'user_id'=>auth()->user()->id,
            'cv'=> $datos['cv']
        ]);

        //notificaciones
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));
        
        //mostramos mensaje de enviado
        session()->flash('mensaje','Ya lo enviaste eh');
        return redirect()->back();

    
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
