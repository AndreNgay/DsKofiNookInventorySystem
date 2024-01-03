<?php

namespace App\Livewire\Units;

use Livewire\Component;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class Page extends Component
{
    public $units, $categories;
    public $dry_ingredients_default_unit, $liquids_default_unit, $counts_default_unit;


    public $unit, $id, $unit_name, $category_id, $unit_conversion;

    public function mount() {

    }
    
    public function render()
    {
        $this->units = Unit::all();
        $this->categories = Category::all();
        $this->liquids_default_unit = Unit::where('category_id', 1)->where('default_unit', true)->first();
        $this->dry_ingredients_default_unit = Unit::where('category_id', 2)->where('default_unit', true)->first();
        $this->counts_default_unit = Unit::where('category_id', 3)->where('default_unit', true)->first();
        return view('livewire.units.page');
    }

    public function categoryChanged() {
        
    }

    public function resetInputs() {
        $this->id = '';
        $this->unit_name = '';
        $this->category_id = '';
        $this->unit_conversion = '';
    }

    public function create() {
        $this->resetInputs();
    }

    public function store() {
        $this->validate([
            'unit_name' => 'required',
            'category_id' => 'required',
            'unit_conversion' => 'required'
        ]);

        Unit::create([
            'unit_name' => $this->unit_name,
            'category_id' => $this->category_id,
            'unit_conversion' => $this->unit_conversion
        ]);

        session()->flash('message', "Unit " . $this->unit_name . " created successfully.");
        $this->resetInputs();
    }

    public function edit($id) {
        $unit = Unit::find($id);
        $this->id = $unit->id;
        $this->unit_name = $unit->unit_name;
        $this->category_id = $unit->category_id;
        $this->unit_conversion = $unit->unit_conversion;
    }

    public function update() {
        $this->validate([
            'unit_name' => 'required',
            'category_id' => 'required',
            'unit_conversion' => 'required'
        ]);

        $unit = Unit::find($this->id);
        $unit->update([
            'unit_name' => $this->unit_name,
            'category_id' => $this->category_id,
            'unit_conversion' => $this->unit_conversion
        ]);
        session()->flash('message', 'Unit updated successfully.');
    }

    public function delete($id) {
        $this->unit = Unit::find($id);
    }

    // to add: if unit is default, can't be delete
    public function destroy() {
        $this->unit->delete();
        session()->flash('message', 'Unit deleted successfully.');
    }
}
