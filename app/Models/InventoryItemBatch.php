<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItemBatch extends Model
{
    protected $fillable = [
        'batch_number',
        'stock',
        'expiration_date',
        'inventory_item_id',
        'category_id',
        'measurement_id',
        'unit_id'
    ];

    use HasFactory;
}
