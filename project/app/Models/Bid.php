<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Bid extends Model
{
    protected $fillable = ['auction_id', 'user_id', 'bid_amount', 'winner', 'highest_amount', 'is_live'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id')->withDefault(['email' => Admin::find(1)->email, 'name' => Admin::find(1)->name]);
    }

    public function auction()
    {
        return $this->belongsTo('App\Models\Auction', 'auction_id');
    }
}