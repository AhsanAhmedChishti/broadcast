<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuctionGallery extends Model
{
    protected $table = "auction_gallery";
    protected $fillable = ['auctionid', 'image'];
    public $timestamps = false;

    public function auction()
    {
        return $this->belongsTo('App\Models\Auction');
    }
}
