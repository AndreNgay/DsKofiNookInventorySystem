<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $fillable = [
        'item_name',
        'stock_reminder',
        'expiration_reminder',
        'category_id',
        'unit_id',
        'total_stock',
        'updated_by',
    ];
    
    use HasFactory;
}
