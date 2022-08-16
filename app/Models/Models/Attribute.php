<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'attribute_id', 'name', 'value_id', 'value_name',
        'value_struct', 'attribute_group_id', 'attribute_group_name',
    ];

    /**
     * Get the product that owns the Attribute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
