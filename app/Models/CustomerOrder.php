<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerOrder extends Model
{
    use HasFactory;

    public function workOrders(): HasMany
    {
        return $this->hasMany(WorkOrder::class);
    }
}
