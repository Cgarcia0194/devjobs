<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    //se tiene que registrar la variable de como está en la vista :message
    public $message;

    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
