<?php

namespace App\Http\Controllers\Seller;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Input;
use Redirect;
use Stripe\Error\Card;
use URL;
use Validator;
use Illuminate\Support\Str;

class StripeController extends Controller
{
    public function __construct()
    {
        //Set Spripe Keys
        $stripe = Generalsetting::findOrFail(1);
        Config::set('services.stripe.key', $stripe->stripe_key);
        Config::set('services.stripe.secret', $stripe->stripe_secret);
    }


    public function store(Request $request)
    {

        $settings = Generalsetting::findOrFail(1);
        $order = new Order;
        $success_url = action('Seller\PaymentController@payreturn');
        $item_name = $settings->title . " Payment";
        $item_number = Str::random(4) . time();
        $item_amount = $request->total;
        $validator = Validator::make($request->all(), [
            'card' => 'required',
            'cvv' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        if ($validator->passes()) {

            $stripe = Stripe::make(Config::get('services.stripe.secret'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->card,
                        'exp_month' => $request->month,
                        'exp_year' => $request->year,
                        'cvc' => $request->cvv,
                    ],
                ]);
                if (!isset($token['id'])) {
                    return back()->with('error', 'Token Problem With Your Token.');
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => $request->currency_code,
                    'amount' => $item_amount,
                    'description' => $item_name,
                ]);

                if ($charge['status'] == 'succeeded') {

                    $order['pay_amount'] = $item_amount;
                    $order['method'] = __('Stripe');
                    $order['buyer_opening_fee'] = $request->buyer_opening_fee;
                    $order['buyer_payment_fee'] = $request->buyer_payment_fee;
                    $order['buyer_fee'] = $request->buyer_fee;
                    $order['buyer_vat'] = $request->buyer_vat;
                    $order['customer_email'] = $request->customer_email;
                    $order['customer_name'] = $request->customer_name;
                    $order['customer_phone'] = $request->customer_phone;
                    $order['order_number'] = $item_number;
                    $order['customer_address'] = $request->customer_address;
                    $order['customer_city'] = $request->customer_city;
                    $order['customer_zip'] = $request->customer_zip;
                    $order['currency_sign'] = $request->currency_sign;
                    $order['auction_id'] = $request->auction_id;
                    $order['bid_id'] = $request->bid_id;
                    $order['user_id'] = $request->user_id;
                    $order['payment_status'] = "Completed";
                    $order['txnid'] = $charge['balance_transaction'];
                    $order['charge_id'] = $charge['id'];
                    $order['status'] = "completed";
                    $order['type'] = "Bid";
                    $order->save();

                    $bid = Bid::find($order->bid_id);
                    $bid->status = 1;
                    $bid->update();

                    $bid->auction->update(['status' => 0]);

                    if ($bid->auction->user_id != 0) {
                        $user = User::find($bid->auction->user_id);
                        $user->income = $item_amount;
                        $user->update();
                    }

                    $gs = Generalsetting::find(1);
                    if ($gs->is_smtp == 1) {
                        $data = [
                            'to' => $request->customer_email,
                            'type' => "payment_confirm",
                            'cname' => $request->customer_name,
                            'amount' => '',
                            'aname' => "",
                            'aemail' => "",
                            'wtitle' => "",
                            'cnumber' => "",
                            'cemail' => "",
                            'cpass' => ""
                        ];

                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    } else {
                        $to = $request->customer_email;
                        $subject = "Your Payment Completed Successfully";
                        $msg = "Hello " . $request->customer_name . "!\nYour Payment Completed Successfully";
                        $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                        mail($to, $subject, $msg, $headers);
                    }

                    return redirect($success_url);
                }
            } catch (Exception $e) {
                return back()->with('unsuccess', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return back()->with('unsuccess', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return back()->with('unsuccess', $e->getMessage());
            }
        }
        return back()->with('unsuccess', 'Please Enter Valid Credit Card Informations.');
    }
}