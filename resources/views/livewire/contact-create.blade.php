<div>
    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col">
                <input wire:model="name" type="text" 
                    class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Name" autofocus required>
                @error('name')
                    <div class="invalid-feedback"">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <div class="col">
                <input wire:model="phone" type="text" 
                    class="form-control form-control-sm @error('phone') is-invalid @enderror" placeholder="Phone" required>
                @error('phone')
                    <div class="invalid-feedback"">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        <div class="row mt-2">
            <div class="col d-flex justify-content-md-end">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
