<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class product extends Model
{
    //
    protected $table = "products";

    public static function getAllProducts(){

        $data = DB::table('products')
            ->select('product_name','product_detail','product_price','product_image')
            ->where('product_category','clothing')
            ->get();

        return $data;
    }
}
