@extends('admin.adminLayout')
@section('admin_content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SHOW PRODUCT</h5>
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert" style="color: Blue">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Brand</th>
                                    <th>Product Image 1</th>
                                    <th>Product Image 2</th>
                                    <th>Product Image 3</th>
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Product Discount</th>
                                    <th>Product Size</th>
                                    <th style="padding: 0  50px 25px 50px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $key => $products)
                                <tr>
                                    <td>{{$products->product_id}}</td>
                                    <td>{{$products->product_name}}</td>
                                    <td>{{$products->catalog_name}}</td>
                                    <td>{{$products->brand_name}}</td>
                                    <td><img src="uploads/{{$products->product_image1_link}}" alt="" width="100px" height="100px"></td>
                                    <td><img src="uploads/{{$products->product_image2_link}}" alt="" width="100px" height="100px"></td>
                                    <td><img src="uploads/{{$products->product_image3_link}}" alt="" width="100px" height="100px"></td>
                                    <td>{{$products->product_quantity}}</td>
                                    <td>{{number_format($products->product_price).' '. 'VND'}}</td>
                                    <td>{{$products->product_discount}} %</td>
                                    <td>{{$products->product_size}}</td>
                                    <td >
                                        <div class="d-flex align-items-center">
                                            <a style="font-size: 30px;" href="/edit_product?id={{$products->product_id}}" ui-toggle-class=""><i class="fa-solid fa-square-pen"></i></a>
                                            <form action="/delete_product?id={{$products->product_id}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{@method_field('delete')}}
                                                <button type="submit" onclick="return confirm('ARE YOU SURE TO DELETE?')" class="active"><i class="fa-solid fa-square-xmark"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!--  -->