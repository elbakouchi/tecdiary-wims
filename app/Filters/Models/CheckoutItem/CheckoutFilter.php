<?php

namespace App\Filters\Models\CheckoutItem;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class CheckoutFilter extends AbstractEloquentFilter
{
    protected $contact;

    public function __constructor($contact)
    {
        $this->contact;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('contact', 'like', "$this->contact%");
    }
}
