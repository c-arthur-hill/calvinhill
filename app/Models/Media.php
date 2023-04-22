<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'medias';
    protected $fillable = ['original_url'];
    protected $dates = ['deleted_at'];

    public function workOrders(): HasMany
    {
        return $this->hasMany(WorkOrder::class);
    }
}
