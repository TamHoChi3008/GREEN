@extends('admin.adminLayout')
@section('admin_content')
<!-- End Page Title -->

  <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">UPDATE CATEGORY PRODUCT</h5>
              <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert" style="color: Blue">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
              <form action="/save_edit_category?id={{$catalog->catalog_id}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="row mb-3">
                  <label for="Category_name" class="col-sm-2 col-form-label">CATEGORY NAME</label>
                  <div class="col-sm-10">
                    <input type="text" style="width:75%; margin-left: 50px" class="form-control" value="{{$catalog->catalog_name}}" name="Catalog_name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">CATEGORY MAIN PARENT</label>
                  <div class="col-sm-10">
                    <input type="text" style="width:75%;margin-left: 50px" class="form-control"value="{{$catalog->catalog_parent}}" name="Catalog_parent">
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