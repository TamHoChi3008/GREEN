<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use App\Models\Catalog;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    public function home(){
        $catalog = Catalog::orderby('catalog_id', 'desc')->get();
        $brand   = Brand::orderby('brand_id', 'desc')->get();
        $product = Product::orderby('product_id', 'desc')->limit(9)->get();
        
        $Men_product = DB::table('product')
        ->join('catalog', 'catalog.catalog_id', '=', 'product.product_category_id')
        ->where('catalog.catalog_parent', 'Men')
        ->orderby('product.product_id', 'desc')->get();
        $count_Men_items = count($Men_product);
        $Men_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Men')->get();

        $Women_product = DB::table('product')
        ->join('catalog', 'catalog.catalog_id', '=', 'product.product_category_id')
        ->where('catalog.catalog_parent', 'Women')
        ->orderby('product.product_id', 'desc')->get();
        $count_Women_items = count($Women_product);
        $Women_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Women')->get();

        $Kids_product = DB::table('product')
        ->join('catalog', 'catalog.catalog_id', '=', 'product.product_category_id')
        ->where('catalog.catalog_parent', 'Bàn')
        ->orderby('product.product_id', 'desc')->get();
        $count_Kids_items = count($Kids_product);
        $Kids_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Kids')->get();

        $brand_parent111 = Brand::orderby('brand_id', 'desc')->where('brand_parent')->get();


        $Nike_product = DB::table('product')
        ->join('brand', 'brand.brand_id', '=', 'product.product_brand_id')
        ->where('brand.brand_parent', 'Nike')
        ->orderby('product.product_id', 'desc')->get();
        $count_Nike_items = count($Nike_product);
        $Nike_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','NIKE')->get();

        $Converse_product = DB::table('product')
        ->join('brand', 'brand.brand_id', '=', 'product.product_brand_id')
        ->where('brand.brand_parent', 'Converse')
        ->orderby('product.product_id', 'desc')->get();
        $count_Converse_items = count($Converse_product);
        $Converse_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','CONVERSE')->get();

        $Adidas_product = DB::table('product')
        ->join('brand', 'brand.brand_id', '=', 'product.product_brand_id')
        ->where('brand.brand_parent', 'Adidas')
        ->orderby('product.product_id', 'desc')->get();
        $count_Adidas_items = count($Adidas_product);
        $Adidas_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','ADIDAS')->get();


        return view('home')->with(compact('catalog','brand','product',
        'Men_product','Women_product','Kids_product','Nike_product','Converse_product','Adidas_product',
        'Men_catalog','Women_catalog','Kids_catalog','Nike_brand','Converse_brand','Adidas_brand',
        'count_Men_items','count_Women_items','count_Kids_items','count_Nike_items','count_Converse_items','count_Adidas_items',));
    }
}