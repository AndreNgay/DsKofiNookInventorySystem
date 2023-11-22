@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row mb-2">
        <livewire:inventory_item.create />
    </div>

    <div class="row">
        <livewire:inventory_item.list />
    </div>
</div>


@endsection