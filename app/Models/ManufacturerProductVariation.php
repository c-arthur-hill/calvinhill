<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ManufacturerProductVariation extends Model
{
    use HasFactory;

    public function size() : BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
    public function color() : BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
    public function ManufacturerProduct() : BelongsTo
    {
        return $this->belongsTo(ManufacturerProduct::class);
    }
}
