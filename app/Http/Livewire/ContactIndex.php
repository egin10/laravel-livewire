<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $isEdit = false;
    public $deleteId;
    public $paginate = 5;
    public $search;

    protected $listeners = [
        'handleMessage' => 'handleMessage',
        'cancelUpdate' => 'handleCancelUpdate'
    ];

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.contact-index', [
            'contacts' => $this->search === null 
                ? Contact::latest()->paginate($this->paginate)
                : Contact::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('phone', 'like', '%' . $this->search . '%')
                            ->paginate($this->paginate)
        ]);
    }

    public function getContact($id)
    {
        $this->isEdit = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }
    
    public function handleMessage($response)
    {
        session()->flash('message', 'Contact '. $response['contact']['name'] .' has been '. $response['status'] .'!');
    }

    public function handleCancelUpdate()
    {
        $this->isEdit = false;
    }

    public function setDeleteId($id = null)
    {
        $this->deleteId = $id;
    }

    public function destroy()
    {
        $contact = Contact::find($this->deleteId);
        $contact->delete();

        $this->handleMessage(['contact' => $contact, 'status' => 'deleted']);
    }
}
