<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


@extends('layouts.app')

@section('content')
<div>
    <h2>Inventory Items</h2>
    <br />
    <div class="row mb-2">
        <livewire:inventory_item.create />
    </div>

    <div class="row">
        <livewire:inventory_item.list />
    </div>
</div>


@endsection
