<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactAutoComplete;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\WarehouseAutoComplete;
use App\Http\Resources\WarehouseCollection;
use App\Models\Contact;
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
    public function inventory(Request $request)
    {
        return Inertia::render('Inventory/Index', [
            'filters'    => $request->all('search'),
            'warehouses' => WarehouseAutoComplete::collection(Warehouse::all()),
            'contacts'=> ContactAutoComplete::collection(Contact::all()),
            'items' => new ItemCollection(Item::filter($request->only('search'))->orderByDesc('id')->paginate()),
        ]);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function warehouses(Request $request){
        return WarehouseAutoComplete::collection(Warehouse::all());
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contacts(Request $request){
        return ContactAutoComplete::collection(Contact::all());
    }
}
