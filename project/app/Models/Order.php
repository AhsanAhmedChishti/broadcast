<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['user_id', 'cart', 'method','shipping', 'pickup_location', 'totalQty', 'pay_amount', 'txnid', 'charge_id', 'order_number', 'payment_status', 'customer_email', 'customer_name', 'customer_phone', 'customer_address', 'customer_city', 'customer_zip','shipping_name', 'shipping_email', 'shipping_phone', 'shipping_address', 'shipping_city', 'shipping_zip', 'order_note', 'status'];

    public function vendororders()
    {
        return $this->hasMany('App\Models\VendorOrder');
    }
	public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
	public function auction()
    {
        return $this->belongsTo('App\Models\Auction')->withDefault(['title' => 'Removed']);
    }

	public function bid()
    {
        return $this->belongsTo('App\Models\Bid','bid_id');
    }

}
