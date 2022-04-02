<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Generalsetting;

class Auction extends Model
{
    protected $fillable = ['user_id', 'category_id', 'bid_id', 'title', 'slug', 'conditions', 'photo', 'descriptions', 'start_bid', 'buy_now', 'status', 'is_approve', 'is_featured', 'is_posted', 'fbpost_time', 'start_date', 'end_date', 'payment_status', 'is_live'];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function bids()
    {
        return $this->hasMany('App\Models\Bid');
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function lowBids()
    {
        if (count($this->bids) > 0)
            return $this->bids()->orderBy('bid_amount')->first()->bid_amount;
        else
            return $this->start_bid;
    }

    public function highBids()
    {
        $gs = Generalsetting::find(1);
        if (count($this->bids) > 0) {
            if ($gs->currency_format == 0)
                return $gs->currency_sign . number_format($this->bids()->orderBy('bid_amount', 'desc')->first()->bid_amount, 2, ',', '.');
            else
                return number_format($this->bids()->orderBy('bid_amount', 'desc')->first()->bid_amount, 2, ',', '.') . $gs->currency_sign;
        } else
            return 'N/A';
    }


    public function highBid()
    {

        if (count($this->bids) > 0) {
            return $this->bids()->orderBy('bid_amount', 'desc')->first()->bid_amount;
        } else
            return 0;
    }
}