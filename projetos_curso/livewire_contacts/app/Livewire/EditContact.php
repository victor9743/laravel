<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Validate;

class EditContact extends Component
{
    // forma de realizar o validate no livewire
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|min:3|max:50|email')]
    public $email;

    #[Validate('required|min:5|max:20')]
    public $phone;

    public Contact $contact;

    public function mount($id)
    {
        $this->contact = Contact::findOrFail($id);
        $this->name = $this->contact->name;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
    }

    public function update_contact()
    {
        $this->validate();

        // check if the name and email already exists
        $contact = Contact::where('name', $this->name)
        ->where('email', $this->email)
        ->where('id', '!=', $this->contact->id)
        ->first();

        if($contact) {
            session()->flash('error', 'Contact already exists');
            return;
        }

        $this->contact->update(
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone
            ]
        );

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.edit-contact');
    }
}
