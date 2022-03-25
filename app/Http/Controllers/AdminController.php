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

Session_start();

class AdminController extends Controller
{
    public function authlogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin_login')->send();
        }
    }
    public function dashboard()
    {
        $this->authlogin();
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.admin_login');
    }
    public function handle_login_admin(Request $request)
    {
        $this->authlogin();
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_name', $result->admin_name);

            return redirect('/dashboard');
        } else {
            Session::flash('error', 'Email or password does not matched!');
            return redirect('/admin_login');
        }
        // return view('admin.dashboard');
    }
    public function logout()
    {
        Session::put('admin_id', null);
        Session::put('admin_name', null);
        return redirect('/admin_login');
    }






    //============CATEGORY============//
    public function add_category()
    {
        $this->authlogin();
        return view('admin.add_category');
    }

    public function show_category()
    {
        $this->authlogin();
        $userData = Catalog::all();
        return view('admin.show_category', ['catalog' => $userData]);
    }
    public function edit_category()
    {
        $this->authlogin();
        $id = $_GET['id'];
        $catalog = Catalog::where('catalog_id', $id)->first();
        return view('admin.edit_category')->with(compact('catalog'));
    }
    public function delete_category()
    {
        $this->authlogin();
        $id = $_GET['id'];
        Catalog::find($id)->delete();
        return redirect()->back()->with('message', 'Deleted sucessfully!!');
    }


    public function save_add_category(Request $request)
    {
        $this->authlogin();
        $data = array();
        $data['Catalog_name'] = $request->Catalog_name;
        $data['Catalog_parent'] = $request->Catalog_parent;
        DB::table('catalog')->insert($data);
        Session::put('message', 'created new catalogs successfully!!');
        return Redirect::to('/add_category');
    }
    public function save_edit_category(Request $request)
    {
        $this->authlogin();
        $id = $_GET['id'];
        $catalog = Catalog::find($id);
        $catalog->catalog_name = $request->input('Catalog_name');
        $catalog->catalog_parent = $request->input('Catalog_parent');

        $catalog->update();
        return redirect()->back()->with('message', 'Updated category sucessfully!');
    }

    //============BRAND============//
    public function add_brand()
    {
        $this->authlogin();
        return view('admin.add_brand');
    }

    public function show_brand()
    {
        $this->authlogin();
        $userData = Brand::all();
        return view('admin.show_brand', ['brand' => $userData]);
    }
    public function edit_brand()
    {
        $this->authlogin();
        $id = $_GET['id'];
        $brand = Brand::where('brand_id', $id)->first();
        return view('admin.edit_brand')->with(compact('brand'));
    }
    public function delete_brand()
    {
        $this->authlogin();
        $id = $_GET['id'];
        Brand::find($id)->delete();
        return redirect()->back()->with('message', 'Deleted sucessfully!!');
    }


    public function save_add_brand(Request $request)
    {
        $this->authlogin();
        $data = array();
        $data['brand_name'] = $request->Brand_name;
        $data['brand_parent'] = $request->Brand_parent;
        DB::table('brand')->insert($data);
        Session::put('message', 'created new brand successfully!!');
        return Redirect::to('/add_brand');
    }
    public function save_edit_brand(Request $request)
    {
        $this->authlogin();
        $id = $_GET['id'];
        $brand = Brand::find($id);
        $brand->brand_name = $request->input('brand_name');
        $brand->brand_parent = $request->input('brand_parent');
        $brand->update();
        return redirect()->back()->with('message', 'Updated brand sucessfully!');
    }

    //============PRODUCT============//
    public function add_product()
    {
        $this->authlogin();
        $catalog = Catalog::orderby('catalog_id', 'desc')->get();
        $brand   = Brand::orderby('brand_id', 'desc')->get();
        return view('admin.add_product')->with(compact('catalog','brand'));
    }
    public function show_product()
    {
        $this->authlogin();
        $product = DB::table('product')
        ->join('catalog','catalog.catalog_id','=','product.product_category_id')
        ->join('brand','brand.brand_id','=','product.product_brand_id')
        ->orderby('product.product_id','desc')->get();

        return view('admin.show_product')->with(compact('product'));
    }
    public function edit_product()
    {
        $this->authlogin();
        $id = $_GET['id'];
        $catalog = Catalog::orderby('catalog_id', 'desc')->get();
        $brand   = Brand::orderby('brand_id', 'desc')->get();
        $product= Product::where('product_id', $id)->first();
        return view('admin.edit_product')->with(compact('brand','product','catalog'));
    }
    public function delete_product()
    {
        $this->authlogin();
        $id = $_GET['id'];
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Deleted sucessfully!');
    }



    public function save_add_product(Request $request)
    {
        $this->authlogin();
        $data = $request->validate([
            'product_category_id' => 'required',
            'product_brand_id' => 'required',
            'product_name' => 'required|max:255',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'product_content' => 'required',
            'product_descript' => 'required',
            'product_discount' => 'required',
            'product_size' => 'required',
            'product_image1_link' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000', 
            'product_image2_link' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000',
            'product_image3_link' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'   
        ]);

        $product = new Product();
        $product->product_category_id = $data['product_category_id'];
        $product->product_brand_id = $data['product_brand_id'];
        $product->product_name = $data['product_name'];
        $product->product_quantity = $data['product_quantity'];
        $product->product_price = $data['product_price'];
        $product->product_content = $data['product_content'];
        $product->product_descript = $data['product_descript'];
        $product->product_discount = $data['product_discount'];
        $product->product_size = $data['product_size'];


        // image
        $get_image1 = $request->file('product_image1_link');
        $path1 = 'uploads/';
        $get_image1_name = $get_image1->getClientOriginalName();
        $name_image1 = current(explode('.', $get_image1_name));
        $new_image1 = $name_image1 . rand(0, 99) . '.' . $get_image1->getClientOriginalExtension();
        $get_image1->move($path1, $new_image1);

        $product->product_image1_link = $new_image1;
       // image2
       $get_image2 = $request->file('product_image2_link');
       $path2 = 'uploads/';
       $get_image2_name = $get_image2->getClientOriginalName();
       $name_image2 = current(explode('.', $get_image1_name));
       $new_image2 = $name_image2 . rand(0, 99) . '.' . $get_image2->getClientOriginalExtension();
       $get_image2->move($path2, $new_image2);

       $product->product_image2_link = $new_image2;
       // image3
       $get_image3 = $request->file('product_image3_link');
       $path3 = 'uploads/';
       $get_image3_name = $get_image3->getClientOriginalName();
       $name_image3 = current(explode('.', $get_image3_name));
       $new_image3 = $name_image3 . rand(0, 99) . '.' . $get_image3->getClientOriginalExtension();
       $get_image3->move($path3, $new_image3);

       $product->product_image3_link = $new_image3;
        $product->save();
        return redirect()->back()->with('message', 'Added new product successfullly!');
    }
    public function save_edit_product(Request $request)
    {
        $id = $_GET['id'];

        $product = Product::find($id);
        $product->product_category_id = $request->input('product_category_id');
        $product->product_brand_id = $request->input('product_brand_id');
        $product->product_name = $request->input('product_name');
        $product->product_quantity = $request->input('product_quantity');
        $product->product_price = $request->input('product_price');
        $product->product_content = $request->input('product_content');
        $product->product_descript = $request->input('product_descript');
        $product->product_discount = $request->input('product_discount');
        $product->product_size = $request->input('product_size');

        // image1
        if ($request->hasFile('product_image1')) {
            $path1 = 'uploads/' . $product->product_image1_link;
            if (file_exists($path1)) {
                unlink($path1);
            }

            $file1 = $request->file('product_image1');
            $extension1 = $file1->getClientOriginalName();
            $file_name1 = current(explode('.', $extension1));
            $file1->move('uploads/', $file_name1);

            $product->product_image1_link = $file_name1;
        }
        // image2
        if ($request->hasFile('product_image2')) {
            $path2 = 'uploads/' . $product->product_image2_link;
            if (file_exists($path2)) {
                unlink($path2);
            }

            $file2 = $request->file('product_image2');
            $extension2 = $file2->getClientOriginalName();
            $file_name2 = current(explode('.', $extension2));
            $file2->move('uploads/', $file_name2);

            $product->product_image2_link = $file_name2;
        }
        // image3
        if ($request->hasFile('product_image3')) {
            $path3 = 'uploads/' . $product->product_image3_link;
            if (file_exists($path1)) {
                unlink($path1);
            }

            $file3 = $request->file('product_image3');
            $extension3 = $file3->getClientOriginalName();
            $file_name3 = current(explode('.', $extension3));
            $file3->move('uploads/', $file_name3);

            $product->product_image3_link = $file_name3;
        }
        
        $product->update();
        return redirect()->back()->with('message', 'Updated successfully!');
    }
    
}
