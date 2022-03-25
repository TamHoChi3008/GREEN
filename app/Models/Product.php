<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'product_category_id', 
        'product_brand_id', 
        'product_name',
        'product_quantity', 
        'product_price',
        'product_content',
        'product_descript',
        'product_discount',
        'product_size',
        'product_image1_link',
        'product_image2_link',
        'product_image3_link'

    ];
    protected $primaryKey = 'product_id';
    protected $table = 'product';
    public function catalog(){
        return $this->belongsTo('App\Models\Catalog','product_category_id','catalog_id');
    }
}
