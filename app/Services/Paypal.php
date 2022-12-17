<?php

namespace App\Services;

use Faker\Core\Uuid;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Paypal
{

    private $urlDev = 'https://api.sandbox.paypal.com';
    private $urlPro =  'https://api.paypal.com';
    private $clientId = 'AdAayJc9JEmPj57lrK420BPrUc-GowoW_pQioCsE3vg2IEZxUhQuMWM2_aCUytw24k8UCpG1wfSTFqiB';
    private $clientSecret = 'EBK8c7hcLJuRLNspSbhir0UB7KVx-G2Fxwjws5Xfcb_5qopeZ-prGwhU26xH_ACUmIoFUeh3ehok5oci';

    public function connection()
    {
        return $this->getToken();
    }

    private function getToken()
    {
        $token = '/v1/oauth2/token';

        $response = Http::withBasicAuth(

            $this->clientId,
            $this->clientSecret

        )->asForm()->post($this->urlDev . $token, [
            "grant_type" => "client_credentials"
        ]);

        if ($response->ok()) {
            $authToken = $response->json('access_token');
            $time = $response->json('expires_in');
            $time -= 90;

            Cache::put('paypal_token', $authToken, $time);
            return $authToken;
        }

        //print_r($response->clientError());

        return $response->json();
    }


    public function createOrder($invoice, $total, $return, $cancel)
    {
        $order = '/v2/checkout/orders';
        if (Cache::has('paypal_token')) {
            $token = Cache::get('paypal_token');
        } else {
            $token = $this->getToken();
        }

        $json = [
            "intent" => 'CAPTURE',
            "invoice_id" => $invoice,
            "purchase_units" => [
                "amount" => [
                    "currency_code" => "EUR",
                    "value" => $total,
                    "breakdown" => [
                        "item_total" => [
                            "currency_code" => "EUR",
                            "value" => $total
                        ]
                    ]
                ]
            ],

            "application_context" => [
                "locale" => 'es-ES',
                "return_url" => $return,
                "cancel_url" => $cancel
            ]
        ];



        $response = Http::withToken($token)->post($this->urlDev . $order, $json);
        return $response->json();
    }



    public function confirmOrder($id){

        $order = '/v2/checkout/orders'. $id. '/capture';
        if (Cache::has('paypal_token')) {
            $token = Cache::get('paypal_token');
        } else {
            $token = $this->getToken();
        }

        $response = Http::withToken($token)->withHeaders(
            [
                //'Paypal-Request-Id' => Uuid::uuid4()
            ]
        )->post($this->urlDev.$order);

        return $response->json();
        
    }

}

   