<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem;

class InventoryItemBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($inventory_item_id) {
        // check if item exists
        $inventory_item = InventoryItem::find($inventory_item_id);

        if(!$inventory_item) {
            return view('livewire.errors.404-not-found');
        }
        return view('livewire.inventory_item_batch.page')->with('inventory_item', $inventory_item);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($inventory_item_id)
    {
        $inventory_item = InventoryItem::find($inventory_item_id);
        return view('livewire.inventory_item_batch.create')->with('inventory_item', $inventory_item);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
