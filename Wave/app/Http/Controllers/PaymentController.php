<?php

namespace App\Http\Controllers;

use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;

class PaymentController extends Controller
{
    public function pay (Request $request)
    {
        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency'      => 'PHP',
                            'amount'        => intval($request->total_amount),
                            'description'   => 'text',
                            'name'          => 'jerome',
                            'quantity'      => 1,
                        ]
                    ],
                    'payment_method_types' => [
                        'card',
                    ],
                    'success_url' => \url('success'),
                    'cancel_url' => route('home'),
                    'description' => 'text',
                ],
            ]
        ];

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->withData($data)
            ->asJson()
            ->post();

        Session::put('session_id',$response->data->id);

        return redirect()->to($response->data->attributes->checkout_url);
    }

    public function success ()
    {
        $sessionId = Session::get('session_id');

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/'.$sessionId)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic '.env('AUTH_PAY'))
            ->asJson()
            ->get();

        return redirect()->route('cart.order')->with(['response' => $response])->withMethod('POST');
    }
}
?>
