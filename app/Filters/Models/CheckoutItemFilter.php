<?php

namespace App\Filters\Models;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class CheckoutItemFilter extends AbstractEloquentFilter
{
    protected $contact;
    protected $warehouse;

    public function __constructor($contact, $warehouse)
    {
        $this->contact = $contact;
        $this->warehouse = $warehouse;
    }

    
    public function apply(Builder $query): Builder
    {
        if(!is_null($this->warehouse))$query->join('checkout_items', 'checkout_items.item_id', '=', 'items.id')
                                            ->join('checkouts', 'checkouts.id', '=', 'checkout_items.checkout_id')
                                            ->where('checkouts.warehouse_id', '=', "$this->warehouse");

        return $query->withoutGlobalScope('account');              
    }
}
