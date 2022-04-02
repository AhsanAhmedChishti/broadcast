<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
	public $timestamps = false;
    public static function countNotification($id)
    {
        return UserNotification::where('user_id','=',$id)->where('is_read','=',0)->get()->count();
    }

    public function bid()
    {
        return $this->belongsTo('App\Models\Bid');
    }
}
