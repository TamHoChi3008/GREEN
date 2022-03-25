<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use App\Models\Catalog;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class LoadController extends Controller
{
    public function Load_product_Men()
        {
        $catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent', 'Men')->get();
        $Men_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Men')->get();
        $Men_product = DB::table('product')
                ->join('catalog', 'catalog.catalog_id', '=', 'product.product_category_id')
                ->join('brand', 'brand.brand_id', '=', 'product.product_brand_id')
                ->where('catalog.catalog_parent', 'Men')
                ->orderby('product.product_id', 'desc')->paginate(9);
        return view('products.Men_product')->with(compact('catalog','Men_catalog','Men_product'));
            
            // $catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent', 'Men')->get();
            // $Men_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Men')->get();
            // $Women_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Women')->get();
            // $Kids_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Kids')->get();

            // $Nike_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','NIKE')->get();
            // $Converse_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','CONVERSE')->get();
            // $Adidas_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','ADIDAS')->get();

            // $Men_product = DB::table('product')
            //     ->join('catalog', 'catalog.catalog_id', '=', 'product.product_category_id')
            //     ->join('brand', 'brand.brand_id', '=', 'product.product_brand_id')
            //     ->where('catalog.catalog_parent', 'Men')
            //     ->orderby('product.product_id', 'desc')->paginate(8);
    
            // return view('products.Men_product')->with(compact('catalog','Men_catalog','Women_catalog','Kids_catalog','Nike_brand','Converse_brand','Adidas_brand','Men_product'));
        }
    //     $catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent', 'Men')->get();
    //     $Men_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Men')->get();
    //     $Women_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Women')->get();
    //     $Kids_catalog = Catalog::orderby('catalog_id', 'desc')->where('catalog_parent','Kids')->get();
       

    //     $brand = Brand::orderby('brand_id', 'desc')->get();
    //     $Nike_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','NIKE')->get();
    //     $Converse_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','CONVERSE')->get();
    //     $Adidas_brand = Brand::orderby('brand_id', 'desc')->where('brand_parent','ADIDAS')->get();

    //     $Men_product = DB::table('product')
    //         ->join('catalog', 'catalog.catalog_id', '=', 'product.product_category_id')
    //         ->where('catalog.catalog_parent', 'Men')
    //         ->orderby('product.product_id', 'desc')->paginate(8);

    //     return view('products.Men_product')->with(compact('catalog','brand','Men_catalog','Women_catalog','Kids_catalog','Nike_brand','Converse_brand','Adidas_brand', 'Men_product'));
    // }
}