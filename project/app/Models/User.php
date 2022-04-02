<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = ['first_name', 'last_name', 'photo','cover_photo', 'zip', 'residency', 'city', 'address', 'phone', 'fax', 'email', 'password', 'verification_link', 'affilate_code', 'type', 'company_name', 'cvr_number', 'customer_number', 'is_featured', 'is_charity'];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function bids()
    {
        return $this->hasMany('App\Models\Bid');
    }
    public function auctions()
    {
        return $this->hasMany('App\Models\Auction');
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function socialProviders()
    {
        return $this->hasMany('App\Models\SocialProvider');
    }
    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'user_id');
    }
}