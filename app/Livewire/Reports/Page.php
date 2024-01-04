<?php

namespace App\Livewire\Reports;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Category;

use App\Models\InventoryItem;
use App\Models\Unit;

class Page extends Component
{

    use WithPagination;

    public function render()
    {
        $inventory_items = InventoryItem::simplePaginate(10);
        $categories = Category::all();
        $units = Unit::all();
        return view('livewire.reports.page', [
            'inventory_items' => $inventory_items,
            'categories' => $categories,
            'units' => $units,
        ]);

    public $inventoryItems, $categories, $units;
    public $query; // For search query
    public $selectedRestockFilter = ''; // For selected restock filter
    public $categoryFilter = null; // For category filter
    public $selectedItems = [];

    protected $listeners = ['restockFilterSelected' => 'updateSelectedRestockFilter'];

    public function mount()
    {
        $this->categories = Category::all();
        $this->units = Unit::all();
        $this->refreshInventoryItems();
    }

    public function render()
    {
        $filteredInventoryItems = $this->applyFilters();

        return view('livewire.reports.page', [
            'filteredInventoryItems' => $filteredInventoryItems,
        ]);
    }

    public function toggleSelected($itemId)
    {
        $key = array_search($itemId, $this->selectedItems);

        if ($key !== false) {
            unset($this->selectedItems[$key]);
        } else {
            $this->selectedItems[] = $itemId;
        }
    }

    public function refreshInventoryItems()
    {
        $this->inventoryItems = InventoryItem::all();
    }

    public function restockReminderStatus($totalStock, $stockReminder)
    {
        if ($totalStock < $stockReminder) {
            return 'Restock ASAP';
        } elseif ($stockReminder < $totalStock && $totalStock < $stockReminder * 3) {
            return 'Almost Out of Stock';
        } elseif ($totalStock > $stockReminder * 3) {
            return 'Lot of Stock Left';
        } else {
            return 'Unknown Restock Status';
        }
    }

    public function applyFilters()
    {
        $inventoryItemsQuery = InventoryItem::query();

        if ($this->query) {
            $inventoryItemsQuery->where('item_name', 'like', '%' . $this->query . '%');
        }

        if ($this->selectedRestockFilter === 'almost out of stock') {
            $inventoryItemsQuery->whereRaw('stock_reminder < total_stock AND total_stock <= stock_reminder * 3');
        } elseif ($this->selectedRestockFilter === 'lot of stock left') {
            $inventoryItemsQuery->whereRaw('total_stock > stock_reminder * 3');
        } elseif ($this->selectedRestockFilter === 'restock asap') {
            $inventoryItemsQuery->whereRaw('total_stock < stock_reminder');
        }

        if ($this->categoryFilter) {
            $inventoryItemsQuery->where('category_id', $this->categoryFilter);
        }

        $filteredInventoryItems = $inventoryItemsQuery->get();

        if ($filteredInventoryItems->isEmpty()) {
            session()->flash('message', 'No items match the selected criteria.');
        }

        return $filteredInventoryItems;
    }

    public function updateSelectedRestockFilter($restockFilter)
    {
        $this->selectedRestockFilter = $restockFilter;
    }

    public function updatedSelectedItems()
    {
        logger('Updated selected items: ' . implode(', ', $this->selectedItems));
    }

    public function updateRestockFilter($restockFilter)
    {
        $this->selectedRestockFilter = $restockFilter;
    }

    public function updateCategoryFilter($categoryId)
    {
        $this->categoryFilter = $categoryId;
    }

    public function clearFilters()
    {
        $this->reset(['query', 'selectedRestockFilter', 'categoryFilter']);
        $this->refreshInventoryItems();

    }
}
