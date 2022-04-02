<?php

namespace App\Http\Controllers\Seller;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\UserNotification;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $auction = Auction::find($request->auction_id);

        if($auction->status == 0)
        {
            return redirect()->back()->with('unsuccess','This auction is closed!');  
        }

        $current = Carbon::now(Generalsetting::find(1)->time_zone)->format('Y-m-d H:i:s');
        $today = Carbon::parse($current);
        $lastday = Carbon::parse($auction->end_date);

        if($today->gt($lastday)) 
        {
            return redirect()->back()->with('unsuccess','This auction is closed!');   
        }

        //--- Logic Section
        $gs = Generalsetting::find(1);

        $bid_amount = (int)$request->bid_amount;

        if($bid_amount < $auction->start_bid)
        {
        	return redirect()->back()->with('unsuccess','Minimum Bid Amount is: '.$gs->currency_sign.$auction->start_bid);   
        }

          $highest = Bid::where('auction_id','=',$request->auction_id)->orderBy('bid_amount','desc')->first();
        

        if(isset($highest))
        {
            $highestt = $highest->bid_amount;
            $userHighestBid = $highest->highest_amount;

            if($bid_amount > $highestt)
            {   
                $ck = Bid::where('user_id','=',Auth::user()->id)->where('auction_id','=',$auction->id)->first();
                if(isset($ck)){
                    // HIGHEST AMOUNT
                    if($gs->bid_increase > 0){
                        $h_amnt = Bid::where('auction_id','=',$request->auction_id)->orderBy('highest_amount','desc')->first();
                        if($bid_amount < $h_amnt->highest_amount){
                            if($bid_amount < $userHighestBid){

                                $h_amnt->bid_amount = $bid_amount + $gs->bid_increase;
                                $h_amnt->update();
                                $ck->bid_amount = $bid_amount;
                                $ck->update();
                            }
                            return redirect()->back()->with('unsuccess','Your Bid was Higher from Current bid!');     
                        }elseif($bid_amount > $h_amnt->highest_amount){
                            $ck->highest_amount = $bid_amount;
                            $ck->bid_amount = $highestt + $gs->bid_increase;
                            $ck->update();
                        }
                        else {
                            return redirect()->back()->with('unsuccess','This Amount Has Already been Taken.');     
                        }
                    }else{
                        $ck->bid_amount = $bid_amount;
                        $ck->update();
                    }
                    $notf = new Notification();
                    $notf->order_id = $ck->auction_id;
                    $notf->save();

                    if($gs->is_smtp == 1)
                    {
                    $data = [
                        'to' => $ck->user->email,
                        'type' => "new_bid",
                        'cname' => $ck->user->first_name.' '.$ck->user->last_name,
                        'amount' => $ck->bid_amount ,
                        'aname' => "",
                        'aemail' => "",
                        'wtitle' => "",
                        'cnumber' => "",
                        'cemail' => "",
                        'cpass' => ""
                    ];

                    $mailer = new GeniusMailer();
                    $mailer->sendAutoMail($data);            
                    }
                    else
                    {
                    $to = $ck->user->email;
                    $subject = "You Have a new bid";
                    $msg = "Hello ".$ck->user->name."!\nA new customer has bid in the auction.";
                    $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
                    mail($to,$subject,$msg,$headers);            
                    }

                    foreach(Bid::where('auction_id','=',$auction->id)->where('user_id','!=',$request->user_id)->get() as $data1)
                    {
                        $user_notf = new UserNotification();
                        $user_notf->bid_id = $ck->id;
                        $user_notf->user_id = $data1->user_id;
                        $user_notf->save();                             
                    }
                    if($ck->auction->user_id != 0)
                    {
                        $user_notf = new UserNotification();
                        $user_notf->auction_id = $ck->auction->id;
                        $user_notf->user_id = $ck->auction->user_id;
                        $user_notf->save();      
                    }

                    $current = Carbon::now(Generalsetting::find(1)->time_zone)->format('Y-m-d H:i:s');
                    $today = Carbon::parse($current);
                    $lastday = Carbon::parse($auction->end_date);
                    $mins = $lastday->diffInMinutes($today);
                    if($mins < 2)
                    {
                        $new_date = Carbon::parse($auction->end_date)->addMinutes(5)->format('Y-m-d H:i:s');
                        $auction->end_date = $new_date;
                        $auction->update();
                    }

                }
                else{

                    // HIGHEST AMOUNT
                    if($gs->bid_increase > 0){
                        $h_amnt = Bid::where('auction_id','=',$request->auction_id)->orderBy('highest_amount','desc')->first();
                        if($bid_amount < $h_amnt->highest_amount){
                            $h_amnt->bid_amount = $bid_amount + $gs->bid_increase;
                            $h_amnt->update();
                            $data = new Bid();
                            $input = $request->all();
                            $data->fill($input)->save();
                        }elseif($bid_amount > $h_amnt->highest_amount){
                            $data = new Bid();
                            $input = $request->all();
                            $input['highest_amount'] = $request->bid_amount;
                            $input['bid_amount'] = $highestt + $gs->bid_increase;
                            $data->fill($input)->save();
                        }
                        else {
                            return redirect()->back()->with('unsuccess','This Amount Has Already been Taken.');     
                        }
                    }else{
                        $data = new Bid();
                        $input = $request->all();
                        $data->fill($input)->save();
                    }
                    $notf = new Notification();
                    $notf->order_id = $data->auction_id;
                    $notf->save();

                    foreach(Bid::where('auction_id','=',$auction->id)->where('user_id','!=',$request->user_id)->get() as $data1)
                    {
                        $user_notf = new UserNotification();
                        $user_notf->bid_id = $data->auction->id;
                        $user_notf->user_id = $data1->user_id;
                        $user_notf->save();                             
                    }
                    
                    if($data->auction->user_id != 0)
                    {
                        $user_notf = new UserNotification();
                        $user_notf->auction_id = $data->auction->id;
                        $user_notf->user_id = $data->auction->user_id;
                        $user_notf->save();      
                    }

                    $current = Carbon::now(Generalsetting::find(1)->time_zone)->format('Y-m-d H:i:s');
                    $today = Carbon::parse($current);
                    $lastday = Carbon::parse($auction->end_date);
                    $mins = $lastday->diffInMinutes($today);
                    if($mins < 2)
                    {
                        $new_date = Carbon::parse($auction->end_date)->addMinutes(5)->format('Y-m-d H:i:s');
                        $auction->end_date = $new_date;
                        $auction->update();
                    }
                }

                return redirect()->back()->with('success','Your Bid Placed Successfully. ');
            }
            else{
                return redirect()->back()->with('unsuccess','Your Bid Amount is Lower than highest Bid. ');         
            }
        }
        else{
                $data = new Bid();
                $input = $request->all();
                if($gs->bid_increase > 0){
                    $input['highest_amount'] = $request->bid_amount;
                }
                $data->fill($input)->save();
                    $notf = new Notification();
                    $notf->order_id = $data->auction_id;
                    $notf->save();

                    if($data->auction->user_id != 0)
                    {
                        $user_notf = new UserNotification();
                        $user_notf->auction_id = $data->id;
                        $user_notf->user_id = $data->auction->user_id;
                        $user_notf->save();      
                    }
                return redirect()->back()->with('success','Your Bid Placed Successfully. ');            
        }


        //--- Logic Section Ends
    }


    public function pay(Request $request)
    {
        //--- Logic Section
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
        return redirect()->back()->with('success','You Have Purchased Successfully. ');            

        //--- Logic Section Ends

    }

    public function index()
    {

        //--- Logic Section
        $bids = Auth::user()->bids;
        return view('seller.bids.index',compact('bids'));     
        //--- Logic Section Ends
    }

    public function show($id)
    {
        //--- Logic Section
        $bid = Bid::findOrFail($id);
        $data = Auction::findOrFail($bid->auction_id);


        return view('seller.bids.details',compact('data'));   


        //--- Logic Section Ends
    }


    public function payment($id)
    {
        //--- Logic Section
        $bid = Bid::findOrFail($id);
        $data = Auction::findOrFail($bid->auction_id);
        if($bid->status == 1)
        {
            return redirect()->back();
        }
        return view('seller.bids.payments',compact('bid','data'));   


        //--- Logic Section Ends
    }


}
