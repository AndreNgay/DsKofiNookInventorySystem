@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <livewire:inventory.search-bar />
    </div>
    <br />
    <div class="row">
        <livewire:inventory.create />
    </div>

    <br />
    <div class="row">
        <livewire:inventory.list />
    </div>
</div>


@endsection