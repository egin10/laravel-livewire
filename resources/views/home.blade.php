@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-center">
                    <i class="bi bi-person-rolodex"></i> Contacts Information
                </div>
                <div class="card-body">
                    <p class="small text-center text-danger">The data is dummy and it will auto refresh 2 times everyday. Please, don't insert the real data!</p>
                    <br>
                    <livewire:contact-index></livewire:contact-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection