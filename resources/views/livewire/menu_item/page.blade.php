<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

@extends('layouts.app')

@section('content')
<div>
    <h2>Menu Items</h2>
    <br />
    <div class="row">
        <livewire:menu_item.create />
    </div>
    <div class="row">
        <livewire:menu_item.list />
    </div>
</div>


@endsection
