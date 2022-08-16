<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'mercado_livre_id', 'subtitle', 'listing_type_id', 'pictures', 
        'category_id', 'initial_quantity', 'available_quantity', 
        'sold_quantity', 'buying_mode', 'currency_id', 'condition', 
        'site_id', 'price', 'descriptions',
    ];

    /**
     * Get all of the attributes for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
