<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Psr7\Request as GuzzleHTTP;
use GuzzleHttp\Client;

use App\Http\Controllers\Controller;
use App\Models\Models\Mercadolivre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Http, Redirect};
use Illuminate\Support\Str;

class MercadoLivreController extends Controller
{

    protected $appId, $rando_id, $redirectURI, $site_id, $baseURL, $mercado_livre;

    public function __construct(Mercadolivre $mercado_livre)
    {
        $this->appId = '1482858626177657';
        $this->secretKey = 'lvMQhs4b1UqqfJdxroifg3mawxtcNoYD';
        $this->rando_id = Hash::make(Str::random(40));
        $this->redirectURI = 'http://localhost:8000/response';
        $this->site_id = 'MLB';
        $this->mercado_livre = $mercado_livre;
    }

    public function index(Request $request)
    {

        $url = "https://auth.mercadolivre.com.br/authorization?response_type=code&client_id=$this->appId&state=$this->rando_id&redirect_uri=$this->redirectURI";

        return Redirect::intended($url);
    }

    public function response(Request $request)
    {
        return $this->access_token($request);
    }

    public function access_token(Request $request)
    {
        $response = Http::asForm()->post("https://api.mercadolibre.com/oauth/token", [
            'grant_type' => 'authorization_code',
            'client_id' => $this->appId,
            'client_secret' => $this->secretKey,
            'code' => $request->code,
            'redirect_uri' => $this->redirectURI,
        ]);

        $json = $response->json();
        return json_encode($json);
    }

    public function create_user_test()
    {
        $data = array(
            'site_id' => 'MLB',
        );

        $access_token = $this->mercado_livre->find(1)["access_token"];

        $client = new Client();
        $res = $client->request('POST', 'https://api.mercadolibre.com/users/test_user', [
            'headers' => [
                'Content-Type'      => 'application/json',
                'Accept'            => 'application/json',
                'Authorization'     => "Bearer $access_token",
            ],
            'body'    => json_encode($data)
        ]);
        $res->getStatusCode();
        $body = $res->getBody();
        $contents = $body->getContents();

        return json_decode($contents);
    }
}
