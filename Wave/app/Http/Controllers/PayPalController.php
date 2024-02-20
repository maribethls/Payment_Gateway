<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;
use App\Models\Cart;
use App\Models\Product;
use DB;
class PayPalController extends Controller
{
    public function payment()
    {
        try {
            $provider = new ExpressCheckout;
            
            $cart = Cart::where('user_id',auth()->user()->id)->where('order_id',null)->get()->toArray();
            
            $data = [];
            
            // return $cart;
            $data['items'] = array_map(function ($item) use($cart) {
                $name=Product::where('id',$item['product_id'])->pluck('title');
                return [
                    'name' =>$name ,
                    'price' => $item['price'],
                    'desc'  => 'Thank you for using paypal',
                    'qty' => $item['quantity']
                ];
            }, $cart);
    
            $data['invoice_id'] ='ORD-'.strtoupper(uniqid());
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = route('payment.success');
            $data['cancel_url'] = route('payment.cancel');
    
            $total = 0;
            foreach($data['items'] as $item) {
                $total += $item['price']*$item['qty'];
            }
    
            $data['total'] = $total;
            if(session('coupon')){
                $data['shipping_discount'] = session('coupon')['value'];
            }
            Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => session()->get('id')]);
      
            $response = $provider->setExpressCheckout($data);
        
            return redirect($response['paypal_link']);
        } catch(\Error $err) {
            request()->session()->flash('error','Payment via credit card | debit card is not yet implemented. Sorry for the inconvenience.');
            return redirect(route('checkout'));
        }
    }
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        // return $response;
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            request()->session()->flash('success','You successfully pay from Paypal! Thank You');
            session()->forget('cart');
            session()->forget('coupon');
            return redirect()->route('home');
        }
  
        request()->session()->flash('error','Something went wrong please try again!!!');
        return redirect()->back();
    }
}
