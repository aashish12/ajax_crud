<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = "categories";

    protected $fillable = ['category_name','category_description', 'category_icon', 'category_color'];
}
