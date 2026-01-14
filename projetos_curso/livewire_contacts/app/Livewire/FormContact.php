<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormContact extends Component
{
    // forma de realizar o validate no livewire
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|min:3|max:50|email')]
    public $email;

    #[Validate('required|min:5|max:20')]
    public $phone;

    public function new_contact()
    {
        // chamada do validate
        $this->validate();

        // salvando temporáriamente os dados em um arquivo de log storage/logs
        // Log::info('Novo Contato: ' . $this->name . ' - ' . $this->email . ' - ' . $this->phone);

        // savando dados no banco caso o nome e o email sejam unicos em cada registro respectivamente
        $result = Contact::firstOrCreate(
            // campos que serão únicos em cada contato
            [
                'name' => $this->name,
                'email' => $this->email
            ],
            [
                'phone' => $this->phone
            ]
        );

        // check for success or error
        // wasRecentlyCreated: serve para retornar se o contato foi criado recentemente(ultimo salvamento) ou se já existe
        if($result->wasRecentlyCreated){
            // reseta os dados se houver sucesso no salvamento
            $this->reset();

            // adicionando um evento
            $this->dispatch('contact_added');

            // success notification
            $this->dispatch(
                'notification',
                type: 'success',
                title: 'Contact created successfully',
                position: 'center'
            );
        } else {
            // error notification
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'The Contact already exists',
                position: 'center'
            );
        }
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
