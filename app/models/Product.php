<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
    protected $fillable=['product_name','price','slug', 'product_desc','status','category_id'];

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function product_image(){
        return $this->hasMany(ProductImage::class);
    }

}
