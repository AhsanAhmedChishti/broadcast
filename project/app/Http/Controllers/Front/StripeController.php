<?php

namespace App\Http\Controllers\Front;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Auction;
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

class StripeController extends Controller
{
  public function __construct()
    {
        //Set Spripe Keys
        $stripe = Generalsetting::findOrFail(1);
        Config::set('services.stripe.key', $stripe->stripe_key);
        Config::set('services.stripe.secret', $stripe->stripe_secret);
    }


    public function store(Request $request){


     $settings = Generalsetting::findOrFail(1);
        $order = new Order;
        $success_url = action('Front\PaymentController@payreturn');
        $item_name = $settings->title." Payment";
        $item_number = str_random(4).time();
        $item_amount = $request->total;
        $validator = Validator::make($request->all(),[
                        'card' => 'required',
                        'cvv' => 'required',
                        'month' => 'required',
                        'year' => 'required',
                    ]);

        if ($validator->passes()) {

            $stripe = Stripe::make(Config::get('services.stripe.secret'));
            try{
                $token = $stripe->tokens()->create([
                    'card' =>[
                            'number' => $request->card,
                            'exp_month' => $request->month,
                            'exp_year' => $request->year,
                            'cvc' => $request->cvv,
                        ],
                    ]);
                if (!isset($token['id'])) {
                    return back()->with('error','Token Problem With Your Token.');
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => $request->currency_code,
                    'amount' => $item_amount,
                    'description' => $item_name,
                    ]);

                if ($charge['status'] == 'succeeded') {
        $auction = Auction::find($request->auction_id);


              $data = Bid::where('user_id','=',Auth::user()->id)->where('auction_id','=',$auction->id)->first();
                if(isset($data)){
                    $data->bid_amount = $auction->buy_now;
                    $data->winner = 1;
                    $data->update();
                    $notf = new Notification();
                    $notf->order_id = $data->auction_id;
                    $notf->save();

                }
                else{
                    $data = new Bid();
                    $input = $request->all();
                    $input['bid_amount'] = $auction->buy_now;
                    $input['winner'] = 1;
                    $data->fill($input)->save();
                    $notf = new Notification();
                    $notf->order_id = $data->auction_id;
                    $notf->save();
                    
                }

        $auction->status = 0;
        $auction->bid_id = $data->id;
        $auction->update();



                    $order['pay_amount'] = $item_amount;
                    $order['method'] = $request->method;
                    $order['customer_email'] = $request->customer_email;
                    $order['customer_name'] = $request->customer_name;
                    $order['customer_phone'] = $request->customer_phone;
                    $order['order_number'] = $item_number;
                    $order['customer_address'] = $request->customer_address;
                    $order['customer_city'] = $request->customer_city;
                    $order['customer_zip'] = $request->customer_zip;
                    $order['currency_sign'] = $request->currency_sign;
                    $order['auction_id'] = $request->auction_id;
                    $order['bid_id'] = $data->id;
                    $order['user_id'] = $request->user_id;
                    $order['payment_status'] = "Completed";
                    $order['txnid'] = $charge['balance_transaction'];
                    $order['charge_id'] = $charge['id'];
                    $order['shipping_city'] = $request->shipping_city;
                    $order['shipping_address'] = $request->shipping_address;
                    $order['shipping_zip'] = $request->shipping_zip;      
                    $order['status'] = "completed";              
                    $order->save();

                    $bid = Bid::find($order->bid_id);
                    $bid->status = 1;
                    $bid->update();

                    if($bid->auction->user_id != 0)
                    {
                        $user = User::find($bid->auction->user_id);
                        $user->income = $item_amount;
                        $user->update();
                    }

                    return redirect($success_url);
                }
                
            }catch (Exception $e){
                return back()->with('unsuccess', $e->getMessage());
            }catch (\Cartalyst\Stripe\Exception\CardErrorException $e){
                return back()->with('unsuccess', $e->getMessage());
            }catch (\Cartalyst\Stripe\Exception\MissingParameterException $e){
                return back()->with('unsuccess', $e->getMessage());
            }
        }
        return back()->with('unsuccess', 'Please Enter Valid Credit Card Informations.');
    }
}
