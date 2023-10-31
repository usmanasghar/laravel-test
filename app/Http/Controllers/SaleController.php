<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemSale;
use App\Models\Sale;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function index(): View
    {
        return view('sales.index', ['sales' => Sale::with(['items', 'item_sale'])->get()]);
    }


    public function create(Request $request)
    {
        return view('sales.create', ['items' => Item::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $items = $data['items'];
        $sale = Sale::create();
        foreach ($items as $key => $value) {
            ItemSale::create([
                'item_id' => $value,
                'sale_id' => $sale->id,
                'unit_price' => $data['unit_price'][$key],
                'quantity' => $data['quantity'][$key],
                'total_price' => $data['total_price'][$key]
            ]);
        }
        return response()->json(['message' => 'Saved successfully']);
    }
}
