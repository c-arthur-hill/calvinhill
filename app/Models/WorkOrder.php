<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class WorkOrder extends Model
{
    protected $table = 'work_orders';

    use HasFactory;

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function customerOrder(): BelongsTo
    {
        return $this->belongsTo(CustomerOrder::class);
    }

    public function manufacturerProductVariation(): BelongsTo
    {
        return $this->belongsTo(ManufacturerProductVariation::class);
    }

    public function requestedShippingMethod(): BelongsTo
    {
        return $this->belongsTo(RequestedShippingMethod::class);
    }

    public function workOrderItems(): HasMany
    {
        return $this->hasMany(WorkOrderItem::class);
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class);
    }
}
