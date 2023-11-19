@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <livewire:inventory.search-bar />
        </div>
        <div class="col-md-2">
            <livewire:inventory.create />
        </div>
    </div>
    <br />
    <div class="row">
        <livewire:inventory.list />
    </div>
</div>


@endsection