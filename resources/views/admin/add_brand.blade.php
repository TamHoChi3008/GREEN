@extends('admin.adminLayout')
@section('admin_content')
<!-- End Page Title -->

  <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ADD BRAND PRODUCT</h5>
              <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert" style="color: Blue">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
              <!-- General Form Elements -->
              <form action="/save_add_brand" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="row mb-3">
                  <label for="Brand_name" class="col-sm-2 col-form-label">BRAND NAME</label>
                  <div class="col-sm-10">
                    <input type="text" style="width:75%; margin-left: 50px" class="form-control" name="Brand_name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="Brand_name" class="col-sm-2 col-form-label">BRAND NAME PARENT</label>
                  <div class="col-sm-10">
                    <input type="text" style="width:75%; margin-left: 50px" class="form-control" name="Brand_parent">
                  </div>
                </div>
                


                <div class="row mb-3">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary buttonS">SUBMIT</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>  
      </div>
    </section>
@endsection