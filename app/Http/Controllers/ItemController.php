<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psr\Http\Message\RequestInterface;

class ItemController extends Controller
{

    public function index(): View
    {
        return view('items.index', ['items' => Item::all()]);
    }


    public function create(): View
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'arabic_name' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return redirect('items/create')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        Item::create($validated);
        return redirect('/items')->with(['message' => 'Item created successfully.']);
    }
}
