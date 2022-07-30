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
        return $query->where('checkout_items.contact_id', '=', "$this->contact")->orWhere('checkout_items.warehouse_id', '=', "$this->warehouse");
    }
}
