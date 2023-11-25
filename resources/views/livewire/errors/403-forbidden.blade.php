<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1 class="display-1 text-danger">403</h1>
    <p class="lead">Access Forbidden. You don't have permission to access this resource.</p>
    <a href="/" class="btn btn-primary">Back to Home</a>
</div>
@endsection
