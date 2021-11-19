<div>
    <form wire:submit.prevent="update">
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
            <div class="col bg-light clearfix">
                <button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
                <button wire:click="cancel" type="button" class="btn btn-sm btn-danger float-end" style="margin-right: 5px;">Cancel</button>
            </div>
        </div>
    </form>
</div>
