<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;


class ChartController extends Controller
{
    public function getEarningsData()
    {
        $earningsData = MenuItem::select('item_name', 'amount_of_times_bought')->get();

        return response()->json($earningsData);
    }
}


