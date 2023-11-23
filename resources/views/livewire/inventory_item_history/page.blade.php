<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

@extends('layouts.app')
@section('content')
<div>
    <div class="row mb-2">
        <livewire:inventory_item_history.list />
    </div>
</div>
@endsection
