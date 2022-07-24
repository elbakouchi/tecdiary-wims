<?php

namespace App\Filters\Models;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class Checkin extends AbstractEloquentFilter
{
    protected $contact;
    protected $warehouse;

    public function __constructor($contact,$warehouse)
    {
        $this->contact;
        $this->warehouse;
    }

    public function apply(Builder $query): Builder
    {
       return $query->where('contact_id', '=', "$this->contact")->orWhere('warehouse_id', '=', "$this->warehouse");
    }
}
