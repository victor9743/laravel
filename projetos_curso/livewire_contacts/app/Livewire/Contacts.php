<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;
    public string $search = "";
    private int $contacts_per_page = 5;

    // faz ouvir o contact_added quando for chamado. se chamado entra no método e atualiza a lista de contatos
    #[On('contact_added')]
    public function update_contact_list()
    {
    }

    public function render()
    {
        $contacts = null;

        if ($this->search)
        {
            $contacts = Contact::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%')
                        ->paginate($this->contacts_per_page);
        } else {
            $contacts = Contact::paginate($this->contacts_per_page);
        }

        return view('livewire.contacts')->with('contacts', $contacts);
    }
}
