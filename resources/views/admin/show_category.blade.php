@extends('admin.adminLayout')
@section('admin_content')

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">SHOW CATEGORY PRODUCT</h5>
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
                                            <th>CATEGORY ID</th>
                                            <th>CATEGORY NAME</th>
                                            <th>CATEGORY PARENT</th>
                                            <th style="padding: 0  50px 25px 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($catalog as $UserData)
                                        <tr>
                                            <td>{{$UserData->catalog_id}}</td>
                                            <td>{{$UserData->catalog_name}}</td>
                                            <td>{{$UserData->catalog_parent}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <a style="font-size: 30px;" href="/edit_category?id={{$UserData->catalog_id}}" ui-toggle-class=""><i  class="fa-solid fa-square-pen"></i></a>
                                                <form action="/delete_category?id={{$UserData->catalog_id}}" method="POST">
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