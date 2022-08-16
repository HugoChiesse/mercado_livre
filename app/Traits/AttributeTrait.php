<?php

namespace App\Traits;

use App\Models\Models\{Attribute, Mercadolivre, Product};
use Illuminate\Support\Arr;

trait AttributeTrait
{
    public function header_uri()
    {
        $access_token = Mercadolivre::find(1)["access_token"];
        return [
            'Content-Type'      => "application/json",
            'Accept'            => "application/json",
            'Authorization'     => "Bearer $access_token",
        ];
    }

    public function body_base($id)
    {
        $product = Product::find($id);
        $data = [
            "title" => $product->title,
            "category_id" => $product->category_id,
            "price" => $product->price,
            "currency_id" => $product->currency_id,
            "available_quantity" => $product->available_quantity,
            "buying_mode" => $product->buying_mode,
            "condition" => $product->condition,
            "sale_terms" => [],
            "pictures" => [[
                "source" => asset($product->pictures),
            ]],
        ];

        if (!$product->mercado_livre_id) {
            $data = array_merge($data, ["listing_type_id" => $product->listing_type_id]);
        }

        return $data;
    }

    public function list_attributes($product_id)
    {
        $array_data = array();
        $attributes = Attribute::where('product_id', $product_id)->get();
        foreach ($attributes as $attribute) {
            $array_data[] = array(
                "id" => $attribute->attribute_id,
                "name" => $attribute->name,
                "value_id" => ($attribute->value_id == '') ? null : $attribute->value_id,
                "value_name" => $attribute->value_name,
                "value_struct" => ($attribute->value_struct == '') ? null : $attribute->value_struct,
                "values" => [],
                "attribute_group_id" => $attribute->attribute_group_id,
                "attribute_group_name" => $attribute->attribute_group_name
            );
        }

        $array_data = [
            "attributes" => $array_data
        ];

        return $array_data;
    }
}
