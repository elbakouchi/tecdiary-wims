<?php

namespace App\Http\Controllers;

use App\Http\Resources\CheckinIdResource;
use App\Http\Resources\CheckinResource;
use App\Http\Resources\ContactAutoComplete;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\WarehouseAutoComplete;
use App\Http\Resources\WarehouseCollection;
use App\Models\Checkin;
use App\Models\Contact;
use App\Models\Item;
use App\Models\Warehouse;
use Exception;
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
        $items = new ItemCollection(Item::filter($request->only('search'))->orderByDesc('id')->paginate());
       
        $error = ''; 
        $checkins = null;


        if($request->only('warehouse') || $request->only('contact')){
            try{
            $checkins = CheckinResource::collection(Checkin::with('items')
            ->where('warehouse_id', $request->only('warehouse'))
            ->orWhere('contact_id',$request->only('contact'))
            ->get());

               $items = $items->filter(function($value, $key) use ($checkins){
                    $chekinItems = $checkins->items;
                    foreach($chekinItems as $checkinItem){
                      return $value->id == $checkinItem->item_id;
                    }
                });
            }catch(Exception $e){
                $error = $e->getMessage();
            }
    
            
        }
       
        return Inertia::render('Inventory/Index', [
            'filters'    => $request->all('search'),
            'warehouses' => WarehouseAutoComplete::collection(Warehouse::all()),
            'contacts'=> ContactAutoComplete::collection(Contact::all()),
            'checkins' => $checkins,
            'items' => $items,
            'error' => $error,
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
