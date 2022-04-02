<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','slug','subtitle','image'];
    public $timestamps = false;

    public function auctions()
    {
        return $this->hasMany('App\Models\Auction');
    }

    

}
