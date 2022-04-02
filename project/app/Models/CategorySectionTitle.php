<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySectionTitle extends Model
{
    protected $table = 'category_section_title';
    protected $fillable = ['category_section_title','category_section_text'];
    public $timestamps = false;
}
