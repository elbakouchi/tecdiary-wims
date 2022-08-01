<?php

namespace App\Filters\Models;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class ItemSearchFitler extends AbstractEloquentFilter
{
    public $search;

    public function __constructor($search)
    {
        $this->search = $search;
    }

    public function apply(Builder $query): Builder
    {
        //dd($query, $this->search);
        if(!is_null($this->search) && !empty($this->search))
        return $query->where('items.name', 'like', "$this->search%")
                   ->orWhere('items.sku', 'like', "$this->search%")
                   ->orWhere('items.code', 'like', "$this->search%")
                   ->orWhere('items.details', 'like', "$this->search%")
                   ->orWhere('items.symbology', 'like', "$this->search%")
                   ->orWhere('items.rack_location', 'like', "$this->search%")
                   //->orWhere('items.account_id', '=', 1)
                   ->withoutGlobalScope('account');
        else return $query;           
    }
}
