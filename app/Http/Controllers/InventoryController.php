<?php

namespace App\Http\Controllers;

use App\Filters\Models\CheckinItemFilter;
use App\Filters\Models\CheckoutItemFilter;
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
use Pricecurrent\LaravelEloquentFilters\EloquentFilters;

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
        try{
            $filters = EloquentFilters::make([
                new CheckinItemFilter($request->contact, $request->warehouse),
                //new CheckoutItemFilter($request->contact, $request->warehouse)
            ]);
            
            //$items = new ItemCollection(Item::filter($request->only('search'))->orderByDesc('id')->paginate());
            
            $items = new ItemCollection(Item::filter($filters));
            $checkins = array('data'=>[]);
            $error ="It's all good";
            
        }catch(Exception $e){
            $items = array('data'=>[]);
            $error = $e->getMessage(); 
            $checkins = array('data'=>[]);
        }
        

       
        return Inertia::render('Inventory/Index', [
            'filters'    => $request->all('search','warehouse', 'contact'),
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
