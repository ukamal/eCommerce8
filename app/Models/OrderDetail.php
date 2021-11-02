<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use App\Models\Backend\Color;
use App\Models\Backend\Size;

class OrderDetail extends Model
{
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id','id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id','id');
    }
}
