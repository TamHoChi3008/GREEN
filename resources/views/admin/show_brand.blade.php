@extends('admin.adminLayout')
@section('admin_content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SHOW BRAND PRODUCT</h5>
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
                                            <th>BRAND ID</th>
                                            <th>BRAND NAME</th>
                                            <th>BRAND PARENT</th>
                                            <th style="padding: 0  50px 25px 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brand as $UserData)
                                        <tr>
                                            <td>{{$UserData->brand_id}}</td>
                                            <td>{{$UserData->brand_name}}</td>
                                            <td>{{$UserData->brand_parent}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <a style="font-size: 30px;" href="/edit_brand?id={{$UserData->brand_id}}" ui-toggle-class=""><i  class="fa-solid fa-square-pen"></i></a>
                                                <form action="/delete_brand?id={{$UserData->brand_id}}" method="POST">
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