@extends('layout.main')
@section('title')
    Page for Products
@endsection
@section('content')

    <div class="container">
        <div class="row" style="padding-top: 40px!important; padding-bottom: 40px!important">
            <a href="{{ route('viewProductForm') }}"> <button class="btn btn-info">Add New Product</button></a>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert">×</a>
                <strong>Heads Up!</strong> {!!Session::get('message')!!}
            </div>
        @endif

        <div class="table-responsive" style="margin-bottom: 30px!important">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>S.NO.</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Product Detail</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Posted Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($datas)
                @foreach($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->product_name }}</td>
                        <td>{{ $data->product_category }}</td>
                        <td>{{ $data->product_detail }}</td>
                        <td>{{ $data->product_price }}</td>
                        <td><img class="img-thumbnail img-responsive" width="100px" height="100px" src="{{ asset('uploads/products/'.$data->product_image) }}" /></td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <!-- Single button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a style="color:#1eb4ff!important;" href="{{ route('editProduct',$data->id) }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp; View</a></li>
                                    <li><a style="color:#23e987!important;" href="{{ url('products/edit/'.$data->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit</a></li>
                                    <li><a style="color:rgba(255, 5, 0, 0.61)!important;" href="{{ url('products/delete/'.$data->id) }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
        {{ $datas->links() }}
    </div>
@endsection

