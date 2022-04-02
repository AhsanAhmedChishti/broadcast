<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TitleDescription extends Model
{
    protected $table = 'auction_title_description';
    protected $fillable = ['title','description'];
    public $timestamps = false;
}
