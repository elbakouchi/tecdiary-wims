<?php

namespace App\Filters\Models;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ItemSearchFitler extends AbstractEloquentFilter
{
    protected $search;

    public function __constructor($search)
    {
        $this->search;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('name', 'like', "$this->search%")
                   ->orWhere('sku', 'like', "$this->search%")
                   ->orWhere('details', 'like', "$this->search%")
                   ->orWhere('symbology', 'like', "$this->search%")
                   ->orWhere('rack_location', 'like', "$this->search%")
                   ->orWhere('items.account_id', '=', 1);
    }
}
