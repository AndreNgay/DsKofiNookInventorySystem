<?php

namespace App\Livewire\Units;

use Livewire\Component;
use App\Models\Unit;
use App\Models\Category;


class Page extends Component
{
    public $units, $categories;
    public $dry_ingredients_default_unit, $liquids_default_unit, $counts_default_unit;


    public $unit_name, $category_id = 1, $unit_conversion;
    
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

    }

}
