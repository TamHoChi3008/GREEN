@extends('admin.adminLayout')
@section('admin_content')

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ADD PRODUCT</h5>
          <?php
          $message = Session::get('message');
          if ($message) {
            echo '<span class="text-alert" style="color: Blue">' . $message . '</span>';
            Session::put('message', null);
          }
          ?>
          <form action="/save_add_product" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Product Name</label>
              <div class="col-sm-10">
                <input type="text" name="product_name" class="form-control" placeholder="Product Name">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Select Category</label>
              <div class="col-sm-10">
                <select class="form-control input-sm m-bot15" aria-label="Default select example" name="product_category_id">
                  @foreach($catalog as $key => $option)
                  <option value="{{$option->catalog_id}}">{{$option->catalog_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Select Brand</label>
              <div class="col-sm-10">
                <select class="form-control input-sm m-bot15" aria-label="Default select example" name="product_brand_id">
                  @foreach($brand as $key => $option)
                  <option value="{{$option->brand_id}}">{{$option->brand_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" value="{{$product->product_image1_link}}">Product image 1</label>
              <div class="col-sm-10">
                <input type="file" name="product_image1_link" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" value="{{$product->product_image2_link}}">Product image 2</label>
              <div class="col-sm-10">
                <input type="file" name="product_image2_link" class="form-control" >
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" value="{{$product->product_image3_link}}">Product image 3</label>
              <div class="col-sm-10">
                <input type="file" name="product_image3_link" class="form-control">
              </div>
            </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                  <input type="text" name="product_quantity" class="form-control" placeholder="Product Quantity">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" name="product_price" class="form-control" placeholder="Product Price" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10">
                  <input type="text" name="product_size" class="form-control" placeholder="Product size" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Discount</label>
                <div class="col-sm-10">
                  <input type="number" name="product_discount" class="form-control" placeholder="Discount" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">product Content</label>
                <div class="col-sm-10">
                  <textarea style="resize: none;" rows="5" class="form-control" name="product_content" placeholder="Product Content" required></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                  <textarea style="resize: none;" rows="5" class="form-control" name="product_descript" placeholder="Product Description" required></textarea>
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