<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_id', 'product_name', 'product_cat','product_description','product_image','product_price'
       ];
}
