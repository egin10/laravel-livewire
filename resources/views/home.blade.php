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
                    <p class="small text-center text-danger">all data is dummy and will be refreshed 2 times a day. Please don't use real data!</p>
                    <br>
                    <livewire:contact-index></livewire:contact-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection