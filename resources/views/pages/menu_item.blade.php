@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <livewire:menu_item.create />
    </div>
    <div class="row">
        <livewire:menu_item.list />
    </div>
</div>
@endsection