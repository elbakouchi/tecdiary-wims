<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemCollection;
use App\Http\Resources\WarehouseAutoComplete;
use App\Http\Resources\WarehouseCollection;
use App\Models\Item;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Inventory/Index', [
            'filters'    => $request->all('search'),
            'warehouses' => new WarehouseAutoComplete(Warehouse::all()),
            'items' => new ItemCollection(Item::filter($request->only('search'))->orderByDesc('id')->paginate()),
        ]);
    }
}
