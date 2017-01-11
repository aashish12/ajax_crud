@extends('layout.main')

@section('content')

    <div class="container">
        <h1> Here product add garne form aaucha</h1>

        <div class="card">
{{--            {!! Form::open(['method' => 'POST', 'route' => 'saveProduct', 'enctype' => 'multipart/form-data']) !!}--}}

            <form method="POST" action="{{ route('saveProduct') }}" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select class="form-control" name="product_category">
                    <option value="clothing">Clothing</option>
                    <option value="electronic">Electronic</option>
                    <option value="watch">Watch</option>
                    <option value="mobile">Mobile</option>
                    <option value="gaming">Gaming</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Product Detail</label>
                <textarea class="form-control" name="product_detail" id="product_detail" placeholder="Add product Detail Here"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Product price</label>
                <input type="text" class="form-control" name="product_price" id="exampleInputPassword1" placeholder="product pricing">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Product Image</label>
                <input type="file" name="product_image" id="product_image">
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> publish product
                </label>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{--{!! Form::close() !!}--}}
            </form>
        </div>

    </div>
@endsection