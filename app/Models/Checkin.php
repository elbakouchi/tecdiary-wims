<?php

namespace App\Models;

use App\Traits\OrderHelpers;
use App\Traits\HasAttachments;
use App\Traits\HasManySyncable;

class Checkin extends Model
{
    use HasAttachments;
    use HasManySyncable;
    use OrderHelpers;

    public static $hasReference = true;

    public static $hasUser = true;

    protected $fillable = [
        'date', 'reference',  'draft', 'contact_id', 'warehouse_id', 'user_id',
        'hash', 'approved_by', 'account_id', 'details', 'extra_attributes', 'approved_at',
    ];

    protected $setHash = true;

    protected $setUser = true;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function del()
    {
        $this->items->each->delete();
        return $this->delete();
    }

    public function delP()
    {
        log_activity(__choice('delete_text', ['record' => 'Item']), $this, $this, 'Item');
        $this->items->each->forceDelete();
        return $this->forceDelete();
    }

    public function items()
    {
        return $this->hasMany(CheckinItem::class)->orderBy('id')->withTrashed();
    }

    public function scopeSearch($query, $s)
    {
        $query->where(
            fn ($q) => $q->where('id', 'like', "%{$s}%")->orWhere('reference', 'like', "%{$s}%")
                ->orWhereHas('contact', fn ($q) => $q->where('name', 'like', "%{$s}%")->orWhere('phone', 'like', "%{$s}%"))
                ->orWhereHas('user', fn ($q) => $q->where('name', 'like', "%{$s}%")->orWhere('username', 'like', "%{$s}%"))
                ->orWhereHas('warehouse', fn ($q) => $q->where('name', 'like', "%{$s}%")->orWhere('code', 'like', "%{$s}%"))
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
