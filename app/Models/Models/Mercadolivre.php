<?php

namespace App\Models\Models;

use App\Traits\AttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Mercadolivre extends Model
{
    use HasFactory, AttributeTrait;

    protected $fillable = [
        'access_token', 'token_type', 'expires_in', 'scope', 'user_id', 'refresh_token',
    ];

    private $access_token, $content_type, $user_id;


    public function sync_product($product_id)
    {
        $product = Product::find($product_id);
        $headers = $this->header_uri();
        $body = array_merge($this->body_base($product_id));
        $body = array_merge($body, $this->list_attributes($product_id));
        if ($product->mercado_livre_id) {
            $url = "https://api.mercadolibre.com/items/$product->mercado_livre_id";
            $method = "PUT";
        } else {
            $url = "https://api.mercadolibre.com/items";
            $method = "POST";
        }
        $client = new Client();
        $res = $client->request($method, $url, [
            'headers' => $headers,
            'body'    => json_encode($body)
        ]);
        $res->getStatusCode();
        $body = $res->getBody();
        $contents = $body->getContents();

        $product->update(['mercado_livre_id' => json_decode($contents)->id]);

        return 'Sincronização efetuada com sucesso!';
    }
}
