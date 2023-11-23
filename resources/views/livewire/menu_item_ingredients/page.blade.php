<?php

use Livewire\Volt\Component;

new class extends Component {
    public $menu_item_id;
}; ?>

@extends('layouts.app')
@section('content')
<div>
    <h2>Menu Item {{ $menu_item_id }} Ingredients</h2>
    <br />
    <div class="row">
        <livewire:menu_item_ingredients.create :menu_item_id="$menu_item_id" />
    </div>
    <div class="row">
        <livewire:menu_item_ingredients.list :menu_item_id="$menu_item_id" />
    </div>
</div>
@endsection
