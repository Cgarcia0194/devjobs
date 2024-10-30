<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        "cv" => ["required", "mimes:pdf"]
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $this->validate();

        //Almacenar el CV
        $datos = $this->validate();

        $cv_path = $this->cv->store('cv', 'public');
        $nombrePDF = str_replace("cv/", "", $cv_path);

        //Asignar el candidato a la vacante
        $this->vacante->candidatos()->create([
            "user_id" => auth()->user()->id,
            "cv" => $nombrePDF
        ]);

        //Crear notificación y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //mostrar al usuario de que se postuló correctamente
        session()->flash("mensaje", "Te has postulado correctamente a la vacante {$this->vacante->titulo}");

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
