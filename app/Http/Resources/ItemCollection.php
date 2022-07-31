<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ItemCollection extends ResourceCollection
{
    public static $wrap = 'item';

    public function toArray($request)
    {
        //dd($request);
        //return parent::toArray($request);
        return $this->collection->transform(function($item){
            //dd($item);
            return [
                'id'               => $item->id,
                'sku'              => $item->sku,
                'code'             => $item->code,
                'name'             => $item->name,
                'symbology'        => $item->symbology,
                'alert_quantity'   => $item->alert_quantity,
                'rack_location'    => $item->rack_location,
                'variants'         => $item->variants,
                'details'          => $item->details,
                'unit_id'          => $item->unit_id,
                'account_id'       => $item->account_id,
                'deleted_at'       => $item->deleted_at,
                'extra_attributes' => $item->extra_attributes,
                'has_serials'      => $item->has_serials == 1 ? true : false,
                'has_variants'     => $item->has_variants == 1 ? true : false,
                'track_weight'     => $item->track_weight == 1 ? true : false,
                'track_quantity'   => $item->track_quantity == 1 ? true : false,
                //'user'             => $item->whenLoaded('user'),
                //'unit'             => $item->whenLoaded('unit'),
                //'stock'            => $item->whenLoaded('stock'),
                //'serials'          => $item->whenLoaded('serials'),
                //'all_stock'        => $item->whenLoaded('allStock'),
                //'categories'       => $item->whenLoaded('categories'),
                //'variations'       => $item->whenLoaded('variations'),
            ];
        });
    }
}
