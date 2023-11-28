<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    //protected $dateFormat = 'd-m-Y';

    protected $fillable = [
        'name',
        'description',
        'buy_price',
        'sell_price',
        'stock',
        'supplier_id',
        'unit_type',
        'status'
    ];

    public function unitType(): BelongsTo
    {
        return $this->belongsTo(UnitType::class,'unit_type');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
