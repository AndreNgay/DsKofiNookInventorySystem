<?php

namespace App\Livewire\PdfGenerator;

use App\Models\Category;
use Livewire\Component;
use App\Models\InventoryItem;
use App\Models\Unit;
require(resource_path('FPDF/fpdf.php'));


class Page extends Component
{
    public $inventory_items, $categories, $units;

    public function render()
    {
        $this->inventory_items = InventoryItem::all();
        $this->categories = Category::all();
        $this->units = Unit::all();

        $pdfScriptPath = app_path('livewire/PdfGenerator/PdfGeneratorScript.php'); // Adjust the filename accordingly
        $pdfScript = require $pdfScriptPath;
        eval($pdfScript);

        return view('livewire.pdfgenerator.page');
    }
}
