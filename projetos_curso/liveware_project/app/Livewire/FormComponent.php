<?php

namespace App\Livewire;

use Livewire\Component;

class FormComponent extends Component
{
    public $email;
    public $name;

    public function submit_form()
    {
        $this->name;
        $this->email;
    }

    public function render()
    {
        return view('livewire.form-component');
    }
}
