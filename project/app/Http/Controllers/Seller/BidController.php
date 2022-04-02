<?php

namespace App\Http\Controllers\Seller;

use Auth;
use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Auction;
use App\Models\LiveBid;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Classes\GeniusMailer;
use App\Models\Generalsetting;
use App\Models\UserNotification;
use App\Http\Controllers\Controller;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $auction = Auction::find($request->auction_id);
        if ($auction->status == 0) {
            return redirect()->back()->with('unsuccess', 'This auction is closed!');
        }

        $current = Carbon::now(Generalsetting::find(1)->time_zone)->format('Y-m-d H:i:s');
        $today = Carbon::parse($current);
        $lastday = Carbon::parse($auction->end_date);
        if ($today->gt($lastday)) {
            return redirect()->back()->with('unsuccess', 'This auction is closed!');
        }

        //--- Logic Section
        $gs = Generalsetting::find(1);

        $bid_amount = (int)$request->bid_amount;
        if ($bid_amount < $auction->start_bid) {
            return redirect()->back()->with('unsuccess', 'Minimum Bid Amount is: ' . $gs->currency_sign . $auction->start_bid);
        }
        $highest = Bid::where('auction_id', '=', $request->auction_id)->orderBy('bid_amount', 'desc')->first();
        if (isset($highest)) {
            $highest = $highest->bid_amount;
            if ($bid_amount > $highest) {
                $ck = Bid::where('user_id', '=', Auth::user()->id)->where('auction_id', '=', $auction->id)->first();
                if (isset($ck)) {
                    // HIGHEST AMOUNT
                    if ($gs->bid_increase > 0) {
                        $h_amnt = Bid::where('auction_id', '=', $request->auction_id)->orderBy('highest_amount', 'desc')->first();
                        if ($bid_amount < $h_amnt->highest_amount) {
                            $h_amnt->bid_amount = $bid_amount + $gs->bid_increase;
                            $h_amnt->update();
                            $ck->bid_amount = $bid_amount;
                            $ck->update();
                        } elseif ($bid_amount > $h_amnt->highest_amount) {
                            $ck->highest_amount = $bid_amount;
                            $ck->bid_amount = $highest + $gs->bid_increase;
                            $ck->update();
                        } else {
                            return redirect()->back()->with('unsuccess', 'This Amount Has Already been Taken.');
                        }
                    } else {
                        $ck->bid_amount = $bid_amount;
                        $ck->update();
                    }
                    $notf = new Notification();
                    $notf->order_id = $ck->auction_id;
                    $notf->save();

                    if ($gs->is_smtp == 1) {
                        $data = [
                            'to' => $ck->user->email,
                            'type' => "new_bid",
                            'cname' => $ck->user->first_name . ' ' . $ck->user->last_name,
                            'amount' => $ck->bid_amount,
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
                        $to = $ck->user->email;
                        $subject = "You Have a new bid";
                        $msg = "Hello " . $ck->user->name . "!\nA new customer has bid in the auction.";
                        $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
                        mail($to, $subject, $msg, $headers);
                    }

                    foreach (Bid::where('auction_id', '=', $auction->id)->where('user_id', '!=', $request->user_id)->get() as $data1) {
                        $user_notf = new UserNotification();
                        $user_notf->bid_id = $ck->id;
                        $user_notf->user_id = $data1->user_id;
                        $user_notf->save();
                    }
                    if ($ck->auction->user_id != 0) {
                        $user_notf = new UserNotification();
                        $user_notf->auction_id = $ck->auction->id;
                        $user_notf->user_id = $ck->auction->user_id;
                        $user_notf->save();
                    }

                    $current = Carbon::now(Generalsetting::find(1)->time_zone)->format('Y-m-d H:i:s');
                    $today = Carbon::parse($current);
                    $lastday = Carbon::parse($auction->end_date);
                    $mins = $lastday->diffInMinutes($today);
                    if ($mins < 2) {
                        $new_date = Carbon::parse($auction->end_date)->addMinutes(5)->format('Y-m-d H:i:s');
                        $auction->end_date = $new_date;
                        $auction->update();
                    }
                } else {

                    // HIGHEST AMOUNT
                    if ($gs->bid_increase > 0) {
                        $h_amnt = Bid::where('auction_id', '=', $request->auction_id)->orderBy('highest_amount', 'desc')->first();
                        if ($bid_amount < $h_amnt->highest_amount) {
                            $h_amnt->bid_amount = $bid_amount + $gs->bid_increase;
                            $h_amnt->update();
                            $data = new Bid();
                            $input = $request->all();
                            $data->fill($input)->save();
                        } elseif ($bid_amount > $h_amnt->highest_amount) {
                            $data = new Bid();
                            $input = $request->all();
                            $input['highest_amount'] = $request->bid_amount;
                            $input['bid_amount'] = $highest + $gs->bid_increase;
                            $data->fill($input)->save();
                        } else {
                            return redirect()->back()->with('unsuccess', 'This Amount Has Already been Taken.');
                        }
                    } else {
                        $data = new Bid();
                        $input = $request->all();
                        $data->fill($input)->save();
                    }
                    $notf = new Notification();
                    $notf->order_id = $data->auction_id;
                    $notf->save();

                    foreach (Bid::where('auction_id', '=', $auction->id)->where('user_id', '!=', $request->user_id)->get() as $data1) {
                        $user_notf = new UserNotification();
                        $user_notf->bid_id = $data->auction->id;
                        $user_notf->user_id = $data1->user_id;
                        $user_notf->save();
                    }

                    if ($data->auction->user_id != 0) {
                        $user_notf = new UserNotification();
                        $user_notf->auction_id = $data->auction->id;
                        $user_notf->user_id = $data->auction->user_id;
                        $user_notf->save();
                    }

                    $current = Carbon::now(Generalsetting::find(1)->time_zone)->format('Y-m-d H:i:s');
                    $today = Carbon::parse($current);
                    $lastday = Carbon::parse($auction->end_date);
                    $mins = $lastday->diffInMinutes($today);
                    if ($mins < 2) {
                        $new_date = Carbon::parse($auction->end_date)->addMinutes(5)->format('Y-m-d H:i:s');
                        $auction->end_date = $new_date;
                        $auction->update();
                    }
                }

                return redirect()->back()->with('success', 'Your Bid Placed Successfully. ');
            } else {
                return redirect()->back()->with('unsuccess', 'Your Bid Amount is Lower than highest Bid. ');
            }
        } else {
            $data = new Bid();
            $input = $request->all();
            if ($gs->bid_increase > 0) {
                $input['highest_amount'] = $request->bid_amount;
            }
            $data->fill($input)->save();
            $notf = new Notification();
            $notf->order_id = $data->auction_id;
            $notf->save();

            if ($data->auction->user_id != 0) {
                $user_notf = new UserNotification();
                $user_notf->auction_id = $data->id;
                $user_notf->user_id = $data->auction->user_id;
                $user_notf->save();
            }
            return redirect()->back()->with('success', 'Your Bid Placed Successfully. ');
        }


        //--- Logic Section Ends
    }


    public function pay(Request $request)
    {
        //--- Logic Section
        $auction = Auction::find($request->auction_id);


        $data = Bid::where('user_id', '=', Auth::user()->id)->where('auction_id', '=', $auction->id)->first();
        if (isset($data)) {
            $data->bid_amount = $auction->buy_now;
            $data->winner = 1;
            $data->update();
            $notf = new Notification();
            $notf->order_id = $data->auction_id;
            $notf->save();
        } else {
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
        return redirect()->back()->with('success', 'You Have Purchased Successfully. ');

        //--- Logic Section Ends

    }

    public function index()
    {
        $today = new Carbon();
        //--- Logic Section
        $pastBids = Auth::user()->bids()->where('status', 1)->paginate(4);
        $activeBids = Auth::user()->bids()->where('status', 0)->paginate(4);
        return view('seller.bids.index', compact('pastBids', 'activeBids'));
        //--- Logic Section Ends
    }

    public function show($id)
    {
        //--- Logic Section
        $bid = Bid::findOrFail($id);
        $data = Auction::findOrFail($bid->auction_id);


        return view('seller.bids.details', compact('data'));


        //--- Logic Section Ends
    }

    public function payment($id)
    {
        //--- Logic Section
        $bid = Bid::findOrFail($id);
        $data = Auction::findOrFail($bid->auction_id);
        if ($bid->status == 1) {
            return redirect()->back();
        }
        return view('seller.bids.payments', compact('bid', 'data'));


        //--- Logic Section Ends
    }

    public function storeAsync(Request $request)
    {
        $gs        = Generalsetting::find(1);
        $userID    = $request->uid;
        $auctionID = $request->aid;
        $bidAmount = (float)$request->amt;

        $auction = Auction::find($auctionID);

        // Validate data
        if (!$bidAmount) {
            return response()->json([
                'status'  => 'failure',
                'message' => "Enter a valid amount."
            ]);
        }

        if ($auction->status == 0) {
            return response()->json([
                'status'  => 'failure',
                'message' => "Auction is closed."
            ]);
        }

        $current = Carbon::now($gs->time_zone)->format('Y-m-d H:i:s');
        $today   = Carbon::parse($current);
        $endDate = Carbon::parse($auction->end_date);

        if ($today->gt($endDate)) {
            return response()->json([
                'status'  => 'failure',
                'message' => "Auction is closed."
            ]);
        }

        if ($bidAmount < (float)$auction->start_bid) {
            return response()->json([
                'status'  => 'failure',
                'message' => "Bid amount cannot be less than {$gs->currency_sign}{$auction->start_bid}."
            ]);
        }

        $highestBid = Bid::where('auction_id', '=', $auctionID)->orderBy('bid_amount', 'desc')->first();

        if ($highestBid && $highestBid->bid_amount > $bidAmount) {
            return response()->json([
                'status'  => 'failure',
                'message' => "You cannot bid lower than the highest bidder."
            ]);
        }

        if ($highestBid && $highestBid->bid_amount == $bidAmount) {
            return response()->json([
                'status'  => 'failure',
                'message' => "That amount is taken! Please increase your bid amount."
            ]);
        }

        // Create or update bid
        $data = [
            'user_id'    => Auth::id(),
            'auction_id' => $auctionID,
            'bid_amount' => $bidAmount,
            'is_live'    => 1,
        ];

        if ($gs->bid_increase > 0) {
            $data['highest_amount'] = $request->bid_amount;
        }

        $bid = Bid::where('user_id', Auth::id())->where('auction_id', $auctionID)->first();

        if ($bid) {
            $bid->update($data);

            $liveBid = LiveBid::where('auction_id', $auctionID)->where('user_id', Auth::id());
            if ($liveBid) {
                $liveBid->delete();
            }

            $liveBid = LiveBid::create([
                'user_id'    => Auth::id(),
                'auction_id' => $auctionID,
                'amount'     => $bidAmount
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => "Bid placed successfully."
            ]);
        } else {
            $newBid = new Bid();

            $newBid->fill($data)->save();
            $notf = new Notification();
            $notf->order_id = $newBid->auction_id;
            $notf->save();

            if ($newBid->auction->user_id != 0) {
                $user_notf = new UserNotification();
                $user_notf->auction_id = $newBid->id;
                $user_notf->user_id = $newBid->auction->user_id;
                $user_notf->save();
            }

            $liveBid = LiveBid::where('auction_id', $auctionID)->where('user_id', Auth::id());
            if ($liveBid) {
                $liveBid->delete();
            }

            $liveBid = LiveBid::create([
                'user_id'    => Auth::id(),
                'auction_id' => $auctionID,
                'amount'     => $bidAmount
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => "Bid placed successfully."
            ]);
        }
    }

    public function bidders($id)
    {
        $gs       = Generalsetting::find(1);
        $bidders  = LiveBid::where('auction_id', $id)->orderBy('id', 'DESC')->get();
        $response = [];

        $response['count'] = LiveBid::where('auction_id', $id)->count();

        if ($bidders->count()) {
            foreach ($bidders as $index => $bidder) {
                $response['data'][] = [
                    'id'         => $bidder->id,
                    'uid'        => "xxq{$bidder->user_id}",
                    'name'       => $bidder->user->first_name,
                    'amount'     => "{$gs->currency_sign}$bidder->amount",
                    'amount_unf' => $bidder->amount
                ];
            }
        }

        return response()->json($response);
    }
}