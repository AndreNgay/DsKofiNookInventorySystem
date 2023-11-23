<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

@extends('layouts.app')

@section('content')
<div>
    <h2>Orders</h2>
    <br />
    <div class="row">

        <div class="col-md-8">
            <livewire:order.list />
        </div>
        <div class="col-md-4">
            <livewire:order.create />
        </div>
    </div>
</div>


@endsection
