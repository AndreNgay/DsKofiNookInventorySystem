<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItemBatchRequest extends Model
{
    protected $fillable = [
        'batch_number',
        'inventory_item_id',
        'stock',
        'expiration_date',
        'category_id',
        'measurement_id',
        'unit_id',
        'requested_by',
    ];

    use HasFactory;
}
