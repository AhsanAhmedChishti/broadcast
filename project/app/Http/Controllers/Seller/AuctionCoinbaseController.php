<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\Auction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Classes\CoinbasePayment;
use App\Http\Controllers\Controller;

class AuctionCoinbaseController extends Controller
{
    public function store(Request $request)
    {
        $order    = new Order();
        $crypto   = new CoinbasePayment();
        $settings = Generalsetting::findOrFail(1);
        $auction  = Auction::find($request->auction_id);

        $crypto->setApiKey($settings->coinbase_api_key);

        $name        = "{$settings->title} Payment";
        $description = "Auction payment for {$auction->title}.";
        $amount      = floatval($request->total);
        $orderNumber = Str::random(4) . time();

        $args = [
            'name'         => $name,
            'description'  => $description,
            'pricing_type' => 'fixed_price',
            'local_price'  => [
                'amount'   => $amount,
                'currency' => $request->currency_code
            ],
            'metadata' => [
                'customer_id'    => $request->user_id,
                'customer_name'  => $request->customer_name,
                'customer_email' => $request->customer_email,
                'order_number'   => $orderNumber
            ]
        ];

        // Create charge
        $response = $crypto->charge($args);

        if ($hostedUrl = $response->data->hosted_url) {
            // Create order
            $order['pay_amount']           = $amount;
            $order['method']               = $request->method;
            $order['customer_email']       = $request->customer_email;
            $order['customer_name']        = $request->customer_name;
            $order['customer_phone']       = $request->customer_phone;
            $order['order_number']         = $orderNumber;
            $order['customer_address']     = $request->customer_address;
            $order['customer_city']        = $request->customer_city;
            $order['customer_zip']         = $request->customer_zip;
            $order['currency_sign']        = $request->currency_sign;
            $order['auction_id']           = $request->auction_id;
            $order['bid_id']               = $request->bid_id;
            $order['user_id']              = $request->user_id;
            $order['payment_status']       = 'created';
            $order['shipping_city']        = $request->shipping_city;
            $order['shipping_address']     = $request->shipping_address;
            $order['shipping_zip']         = $request->shipping_zip;
            $order['status']               = 'created';
            $order['type']                 = 'Auction';
            $order['coinbase_charge_id']   = $response->data->id;
            $order['coinbase_charge_code'] = $response->data->code;
            $order->save();

            return redirect($hostedUrl);
        }

        return back()->with('status', ['danger', 'Something went wrong. Please try again.']);
    }
}
