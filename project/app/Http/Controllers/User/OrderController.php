<?php

namespace App\Http\Controllers\User;

use Datatables;
use App\Classes\GeniusMailer;
use App\Models\Order;
use App\Models\User;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //*** JSON Request
    public function datatables($status)
    {
          $datas = Order::where('user_id','=',Auth::user()->id)->where('status','=','completed')->orderBy('id','desc')->get();  

         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('pay_amount', function(Order $data) {
                                return $data->currency_sign.$data->pay_amount;
                            })
                            ->editColumn('auction', function(Order $data) {
                                return $data->auction->title;
                            })
                            ->addColumn('action', function(Order $data) {
                                return '<div class="action-list"><a href="' . route('user-order-show',$data->id) . '" > <i class="fas fa-eye"></i> Details</a></div>';
                            }) 
                            ->rawColumns(['id','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('user.order.index');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('user.order.details',compact('order'));
    }

    public function print($id)
    {
        $order = Order::findOrFail($id);
        return view('user.order.print',compact('order'));
    }

}