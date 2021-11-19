<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name;
    public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
        $validateData = $this->validate([
            'name' => 'required|min:3|max:255',
            'phone' => 'required|max:15'
        ]);

        $contact = Contact::create($validateData);

        $this->resetInput();

        $this->emit('handleMessage', ['contact' => $contact, 'status' => 'stored']);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
}
