@extends('admin.adminLayout')
@section('admin_content')
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">EDIT PRODUCT</h5>
          <?php
          $message = Session::get('message');
          if ($message) {
            echo '<span class="text-alert" style="color: Blue">' . $message . '</span>';
            Session::put('message', null);
          }
          ?>
          <form action="/save_edit_product?id={{$product->product_id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Product Name</label>
              <div class="col-sm-10">
                <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                            <select name="product_category_id" class="form-control input-sm m-bot15">
                                @foreach($catalog as $key => $option)
                                @if($option->catalog_id == $product->product_catalog_id)
                                <option selected value="{{$option->catalog_id}}">{{$option->catalog_name}}</option>
                                @else
                                <option value="{{$option->catalog_id}}">{{$option->catalog_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
             </div>
             <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Brand</label>
                            <div class="col-sm-10">
                            <select name="product_brand_id" class="form-control input-sm m-bot15">
                                @foreach($brand as $key => $option)
                                @if($option->brand_id == $product->product_category_id)
                                <option selected value="{{$option->brand_id}}">{{$option->brand_name}}</option>
                                @else
                                <option value="{{$option->brand_id}}">{{$option->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
             </div>        

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Product image 1</label>
              <div class="col-sm-10">
                <input type="file" name="product_image1_link" class="form-control" placeholder="Product Image 1">
                <img src="uploads/{{$product->product_image1_link}}" alt="" width="100px" height="100px">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Product image 2</label>
              <div class="col-sm-10">
                <input type="file" name="product_image2_link" class="form-control" placeholder="Product Image 2">
                <img src="uploads/{{$product->product_image2_link}}" alt="" width="100px" height="100px">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Product image 3</label>
              <div class="col-sm-10">
                <input type="file" name="product_image3_link" class="form-control" placeholder="Product Image 3">
                <img src="uploads/{{$product->product_image3_link}}" alt="" width="100px" height="100px">
              </div>
            </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                  <input type="text" value="{{$product->product_quantity}}" name="product_quantity" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" value="{{$product->product_price}}" name="product_price" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10">
                  <input type="text" value="{{$product->product_size}}"  name="product_size" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Discount</label>
                <div class="col-sm-10">
                  <input type="number" value="{{$product->product_discount}}" name="product_discount" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label  class="col-sm-2 col-form-label">Product Content</label>
                <div class="col-sm-10">
                  <textarea style="resize: none;" rows="5" value="{{$product->product_content}}" class="form-control" name="product_content" ></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                  <textarea style="resize: none;" rows="5" class="form-control" value="{{$product->product_descript}}" name="product_descript"></textarea>
                </div>
              </div>




              <div class="row mb-3">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary buttonS">SUBMIT</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection