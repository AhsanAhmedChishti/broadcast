<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use Datatables;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Category;
use App\Models\Generalsetting;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\TitleDescription;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

class AuctionController extends Controller
{
    public function __construct()
    {
        $this->gs = Generalsetting::find(1);
        $this->middleware('auth:admin');
    }


    //*** JSON Request
    public function pendingtables()
    {
        $datas = Auction::where('user_id', '!=', 0)->where('is_approve', 0)->orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('buy_price', function (Auction $data) {
                if ($data->buy_now == null) {
                    return 'Not Included';
                }
                $start_date = date('d M', strtotime($data->start_date));
                $end_date   = date('d M', strtotime($data->end_date));
                if ($this->gs->currency_format == 0) {
                    return  $this->gs->currency_sign . $data->buy_now;
                } else {
                    return  $data->buy_now . $this->gs->currency_sign;
                }
            })
            ->editColumn('type', function (Auction $data) {
                if ($data->is_featured == 1) {
                    return '<span class="badge badge-primary">Featured</span>';
                } else {
                    return '<span class="badge badge-secondary">Basic</span>';
                }
            })

            ->editColumn('bids', function (Auction $data) {
                return count($data->bids);
            })

            ->editColumn('duration', function (Auction $data) {
                $start_date = date('d M', strtotime($data->start_date));
                $end_date   = date('d M', strtotime($data->end_date));
                return  $start_date . ' - ' . $end_date;
            })
            ->addColumn('status', function (Auction $data) {
                $class = $data->is_approve == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->is_approve == 1 ? 'selected' : '';
                $ns = $data->is_approve == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-auction-approve', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Approved</option><option data-val="0" value="' . route('admin-auction-approve', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Not Approved</option>/select></div>';
            })
            ->addColumn('action', function (Auction $data) {
                return '<div class="action-list">
                                <a href="' . route('admin-auction-show', $data->id) . '" class="view" > <i class="fas fa-eye"></i>Show</a>
                                <a href="' . route('admin-auction-edit', $data->id) . '"> <i class="fas fa-edit"></i>Edit</a>
                                <a href="javascript:;" data-href="' . route('admin-auction-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>
                                </a>
                                </div>';
            })
            ->rawColumns(['photo', 'type', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Auction::where('is_approve', 1)->orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('buy_price', function (Auction $data) {
                if ($data->buy_now == null) {
                    return 'Not Included';
                }
                $start_date = date('d M', strtotime($data->start_date));
                $end_date   = date('d M', strtotime($data->end_date));
                if ($this->gs->currency_format == 0) {
                    return  $this->gs->currency_sign . $data->buy_now;
                } else {
                    return  $data->buy_now . $this->gs->currency_sign;
                }
            })
            ->editColumn('type', function (Auction $data) {
                if ($data->is_featured == 1) {
                    return '<span class="badge badge-primary">Featured</span>';
                } else {
                    return '<span class="badge badge-secondary">Basic</span>';
                }
            })
            ->editColumn('bids', function (Auction $data) {
                return count($data->bids);
            })

            ->editColumn('duration', function (Auction $data) {
                $start_date = date('d M', strtotime($data->start_date));
                $end_date   = date('d M', strtotime($data->end_date));
                return  $start_date . ' - ' . $end_date;
            })
            ->addColumn('status', function (Auction $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-auction-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Opened</option><<option data-val="0" value="' . route('admin-auction-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Closed</option>/select></div>';
            })
            ->editColumn('live', function (Auction $data) {
                if ($data->is_live == 1) {
                    return '<span class="badge badge-danger p-2"><i class="fa fa-eye"></i> Live</span>';
                } else {
                    return '<span class="badge badge-dark p-2"><i class="fa fa-eye-slash"></i> Not Live</span>';
                }
            })
            ->addColumn('action', function (Auction $data) {
                return '<div class="action-list">
                                <a href="' . route('admin-auction-show', $data->id) . '" class="view" > <i class="fas fa-eye"></i>Show</a>
                                <a href="' . route('admin-auction-edit', $data->id) . '"> <i class="fas fa-edit"></i>Edit</a>
                                <a href="javascript:;" data-href="' . route('admin-auction-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>
                                </a>
                                </div>';
            })
            ->rawColumns(['photo', 'type', 'status', 'action', 'live'])
            ->toJson(); //--- Returning Json Data To Client Side
    }



    //*** JSON Request
    public function latestdatatables()
    {
        $datas = Auction::where('created_at', '>', Carbon::now(Generalsetting::find(1)->time_zone)->subHours(3)->toDateTimeString())->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('buy_price', function (Auction $data) {
                if ($data->buy_now == null) {
                    return 'Not Included';
                }
                $start_date = date('d M', strtotime($data->start_date));
                $end_date   = date('d M', strtotime($data->end_date));
                if ($this->gs->currency_format == 0) {
                    return  $this->gs->currency_sign . $data->buy_now;
                } else {
                    return  $data->buy_now . $this->gs->currency_sign;
                }
            })
            ->editColumn('type', function (Auction $data) {
                if ($data->is_featured == 1) {
                    return '<span class="badge badge-primary">Featured</span>';
                } else {
                    return '<span class="badge badge-secondary">Basic</span>';
                }
            })

            ->editColumn('bids', function (Auction $data) {
                return count($data->bids);
            })

            ->editColumn('duration', function (Auction $data) {
                $start_date = date('d M', strtotime($data->start_date));
                $end_date   = date('d M', strtotime($data->end_date));
                return  $start_date . ' - ' . $end_date;
            })
            ->addColumn('status', function (Auction $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-auction-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Opened</option><<option data-val="0" value="' . route('admin-auction-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Closed</option>/select></div>';
            })
            ->addColumn('action', function (Auction $data) {
                return '<div class="action-list">
                                <a href="' . route('admin-auction-show', $data->id) . '" class="view" > <i class="fas fa-eye"></i>Show</a>
                                <a href="' . route('admin-auction-edit', $data->id) . '"> <i class="fas fa-edit"></i>Edit</a>
                                <a href="javascript:;" data-href="' . route('admin-auction-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>
                                </a>
                                </div>';
            })
            ->rawColumns(['photo', 'type', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function pending()
    {
        return view('admin.auction.pending');
    }

    //*** GET Request
    public function index()
    {
        return view('admin.auction.index');
    }

    //*** GET Request
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.auction.create', compact('categories'));
    }


    //*** GET Request
    public function status($id1, $id2)
    {
        $data = Auction::findOrFail($id1);
        if ($data->bid_id != 0) {
            $msg['error'] = 'Remove The Winner First';
            return response()->json($msg);
        }
        $data->status = $id2;
        $data->update();
    }

    //*** GET Request
    public function approve($id1, $id2)
    {
        $data = Auction::findOrFail($id1);
        $data->is_approve = $id2;
        if ($data->is_approve == 0) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        $data->update();
    }

    //*** GET Request
    public function winner($id)
    {
        $data = Bid::findOrFail($id);
        $data->winner = 1;
        $data->update();
        Auction::find($data->auction_id)->update(['bid_id' => $data->id, 'status' => 0]);
        $gs = Generalsetting::find(1);
        if ($gs->is_smtp == 1) {
            $data = [
                'to' => $data->user->email,
                'type' => "bid_winner",
                'cname' => $data->user->first_name . ' ' . $data->user->last_name,
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
            $to = $data->user->email;
            $subject = "Congratulations you have won the auction";
            $msg = "Hello " . $data->user->name . "!\nCongratulations you have won the auction";
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }


        return redirect()->back()->with('success', 'Status Updated Successfully.');
    }

    //*** GET Request
    public function remove($id)
    {
        $data = Bid::findOrFail($id);
        $data->winner = 0;
        $data->update();
        Auction::find($data->auction_id)->update(['bid_id' => 0]);
        return redirect()->back()->with('success', 'Status Updated Successfully.');
    }


    public function title_description()
    {
        $auctions = DB::table('auctions')->where('created_at', '>', Carbon::now(Generalsetting::find(1)->time_zone)->subHours(3)->toDateTimeString())->get();

        $auction_title_description = TitleDescription::find(1)->first();
        return view('admin.auction.title_description', compact('auction_title_description', 'auctions'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'photo'      => 'required|mimes:jpeg,jpg,png',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Auction();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $img = Image::make($file->getRealPath())->resize(730, 400);
            $thumbnail = time() . Str::random(8) . '.jpg';
            $img->save(public_path() . '/assets/images/auction/' . $thumbnail);
            $input['photo'] = $thumbnail;
        }
        if ($request->is_featured == "") {
            $input['is_featured'] = 0;
        }
        if ($request->buy_check == "") {
            $input['buy_now'] = null;
        }
        $input['start_date'] = Carbon::parse($input['start_date'])->format('Y-m-d H:i:s');
        $input['end_date'] = Carbon::parse($input['end_date'])->format('Y-m-d H:i:s');
        $input['is_approve'] = 1;
        $input['payment_status'] = 'Completed';
        $input['status'] = 1;

        $data->fill($input)->save();
        //--- Logic Section Ends


        // Set SLug
        $prod = Auction::find($data->id);
        $prod->slug = Str::slug($data->title, '-') . '-' . strtolower(Str::random(3) . $data->id . Str::random(3));
        // Set Thumbnail
        $img = Image::make(public_path() . '/assets/images/auction/' . $prod->photo)->resize(260, 190);
        $thumbnail = time() . Str::random(8) . '.jpg';
        $img->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
        $prod->thumbnail  = $thumbnail;
        $prod->update();

        // Add To Gallery If any
        $lastid = $data->id;
        if ($files = $request->file('gallery')) {
            foreach ($files as  $key => $file) {
                if (in_array($key, $request->galval)) {

                    $gallery = new Gallery;
                    $thumbnail = time() . $file->getClientOriginalName();
                    $img = Image::make($file->getRealPath())->resize(730, 400);
                    $img->save(public_path() . '/assets/images/galleries/' . $thumbnail);
                    $gallery['photo'] = $thumbnail;
                    $gallery['auction_id'] = $lastid;
                    $gallery->save();
                }
            }
        }

        //--- Redirect Section
        $msg = 'New Auction Added Successfully.<a href="' . route('admin-auction-index') . '">Go to auctions.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }



    //*** GET Request
    public function show($id)
    {
        $data = Auction::findOrFail($id);
        return view('admin.auction.show', compact('data'));
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Auction::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        return view('admin.auction.edit', compact('data', 'categories'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'photo'      => 'mimes:jpeg,jpg,png',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Auction::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $img = Image::make($file->getRealPath())->resize(730, 400);
            $thumbnail = time() . Str::random(8) . '.jpg';
            $img->save(public_path() . '/assets/images/auction/' . $thumbnail);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/assets/images/auction/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/auction/' . $data->photo);
                }
            }
            if ($data->thumnail != null) {
                if (file_exists(public_path() . '/assets/images/thumbnails/' . $data->thumnail)) {
                    unlink(public_path() . '/assets/images/thumbnails/' . $data->thumnail);
                }
            }

            $input['photo'] = $thumbnail;
        }
        if ($request->is_featured == "") {
            $input['is_featured'] = 0;
        }
        if ($request->is_live == "") {
            $input['is_live'] = 0;
        }
        if ($request->buy_check == "") {
            $input['buy_now'] = null;
        }
        $input['start_date'] = Carbon::parse($input['start_date'])->format('Y-m-d H:i:s');
        $input['end_date'] = Carbon::parse($input['end_date'])->format('Y-m-d H:i:s');

        $data->update($input);
        //--- Logic Section Ends


        // Set SLug
        $prod = Auction::find($data->id);
        $prod->slug = Str::slug($data->title, '-') . '-' . strtolower(Str::random(3) . $data->id . Str::random(3));
        // Set Thumbnail
        $img = Image::make(public_path() . '/assets/images/auction/' . $prod->photo)->resize(260, 190);
        $thumbnail = time() . Str::random(8) . '.jpg';
        $img->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
        $prod->thumbnail  = $thumbnail;
        $prod->update();


        //--- Redirect Section
        $msg = 'Auction updated successfully. <a href="' . route('admin-auction-index') . '">Go to auctions.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Auction::findOrFail($id);
        //If Photo Doesn't Exist
        if ($data->photo == null) {
            $data->delete();
            //--- Redirect Section
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);
            //--- Redirect Section Ends
        }

        if ($data->galleries->count() > 0) {
            foreach ($data->galleries as $gal) {
                if (file_exists(public_path() . '/assets/images/galleries/' . $gal->photo)) {
                    unlink(public_path() . '/assets/images/galleries/' . $gal->photo);
                }
                $gal->delete();
            }
        }

        if (file_exists(public_path() . '/assets/images/auction/' . $data->photo)) {
            unlink(public_path() . '/assets/images/auction/' . $data->photo);
        }
        if (file_exists(public_path() . '/assets/images/thumbnails/' . $data->thumbnail)) {
            unlink(public_path() . '/assets/images/thumbnails/' . $data->thumbnail);
        }

        $data->delete();
        //--- Redirect Section
        $msg = 'Auction deleted successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    /*******Auction Title and description Update */

    public function title_description_update(Request $request, $id)
    {
        $update = TitleDescription::find($id);

        $update->title = $request->title;
        $update->description = $request->description;

        $update->save();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }
}