<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $contactId;
    public $name;
    public $phone;

    protected $listeners = [
        'getContact' => 'showContact'
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    public function update()
    {
        $validateData = $this->validate([
            'name' => 'required|min:3|max:255',
            'phone' => 'required|max:15'
        ]);
        
        $contact = Contact::find($this->contactId);
        $contact->update($validateData);
        
        $this->emit('handleMessage', ['contact' => $contact, 'status' => 'updated']);
        
        $this->cancel();
    }

    public function cancel()
    {
        $this->emit('cancelUpdate');
    }
}
