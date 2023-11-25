<?php

use Livewire\Volt\Component;
use App\Models\InventoryItem;

new class extends Component {
    public $inventory_item_id;
    public $inventory_item_name = 'jeff';

    public function mount() {
        $inventory_item_id = 2;
        $this->inventory_item_name = InventoryItem::where('id', $this->inventory_item_id)->first()->item_name;
    }
}
?>

@extends('layouts.app')
@section('content')
<div>
    <h2>Inventory Item {{ $inventory_item_id }}  Batches</h2>
    <br />
    <div class="row">
        <livewire:inventory_item_batch.create :inventory_item_id="$inventory_item_id" />
    </div>
    <div class="row mb-2">
        <livewire:inventory_item_batch.list :inventory_item_id="$inventory_item_id" />
    </div>
</div>
@endsection


