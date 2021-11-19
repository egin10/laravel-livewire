<div>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($isEdit)
        <livewire:contact-update>
    @else
        <livewire:contact-create>
    @endif

    <hr>
    
    {{-- Select Max Show Data --}}
    <div class="row mb-3">
        <div class="col-lg-8">
            <select class="form-select form-select-sm w-auto" aria-label="select show data" wire:model="paginate">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="col">
            <input class="form-control form-control-sm" type="text" placeholder="Search.." aria-label="search.." wire:model="search">
        </div>
    </div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-info text-white">Edit</button>
                        <button wire:click="setDeleteId({{ $contact->id }})" class="btn btn-sm btn-danger text-white"
                            data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Contacts is empty.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{  $contacts->links()  }}
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Confirm</h5>
                <button type="button" wire:click="setDeleteId()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="setDeleteId()" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="destroy()" class="btn btn-danger close-modal" data-bs-dismiss="modal">Yes, Delete!</button>
            </div>
        </div>
        </div>
    </div>
  
</div>
