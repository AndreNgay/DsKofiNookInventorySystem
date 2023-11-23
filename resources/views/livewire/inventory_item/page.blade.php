<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


@extends('layouts.app')

@section('content')
<div>
    <div>
        <div class="row">
            <div class="col">
                <h2>Inventory Items</h2>
            </div>

            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover"
                    data-bs-placement="left" data-bs-content="Batch 1 of Inventory Item 1 will expire in 3 days (11/03/23)">
                    <i class="fas fa-bell fa-2x"> </i>
                </button>
            </div>
        </div>
    </div>



    <br />
    <div class="row mb-2">
        <livewire:inventory_item.create />
    </div>

    <div class="row">
        <livewire:inventory_item.list />
    </div>
</div>
@endsection
