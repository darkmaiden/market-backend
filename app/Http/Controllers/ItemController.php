<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function getPreview()
    {
        $items = Item::all();
        return response()->json(['items' => $items]);
    }
}
