<?php

namespace App\Filters\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class CheckinItemFilter extends AbstractEloquentFilter
{
    public $contact;
    public $warehouse;

    public function __constructor($contact, $warehouse)
    {
        $this->contact = $contact;
        $this->warehouse = $warehouse;
    }

    public function apply(Builder $query): Builder
    {
        // return $query->where('contact_id', '=', "$this->contact")->orWhere('warehouse_id', '=', "$this->warehouse" );
        $query->join('checkin_items', 'checkin_items.item_id', '=', 'items.id')
                     ->join('checkins', 'checkins.id', '=', 'checkin_items.checkin_id');
        if(!is_null($this->contact) && !is_null($this->warehouse))
                     $query->where('checkins.contact_id', '=', "$this->contact")
                     ->andWhere('checkins.warehouse_id', '=', "$this->warehouse");
        else if(!is_null($this->contact) && is_null($this->warehouse))  $query->where('checkins.contact_id', '=', "$this->contact");
        else if(is_null($this->contact) &&  !is_null($this->warehouse))$query->where('checkins.warehouse_id', '=', "$this->warehouse");

        return $query->withoutGlobalScope('account');              
    }
}
