@extends('layout.main')
@section('title')
    single product view
@endsection
@section('content')
    <div class="container">
        @if($viewproduct)
            <div class="row" style="margin: 30px 0!important; padding: 20px!important">
                <div class="col-md-5">
                    <img class="img-thumbnail img-responsive" width="100%px" src="{{ asset('uploads/products/'.$viewproduct->product_image) }}" />
                </div>
                <div class="col-md-7">
                    <h2>Product Name: {{ $viewproduct->product_name }}</h2>

                    @if($viewproduct->product_category === "clothing")
                        <p><span class="label label-default">clothing</span></p>
                    @elseif($viewproduct->product_category === "electronic")
                        <p><span class="label label-danger">electroninc</span></p>
                    @elseif($viewproduct->product_category === "watch")
                        <p><span class="label label-info">watch</span></p>
                    @elseif($viewproduct->product_category === "mobile")
                        <p><span class="label label-success">mobile</span></p>
                    @elseif($viewproduct->product_category === "gaming")
                        <p><span class="label label-warning">gaming</span></p>
                    @else
                        <p> There is no any category for this product</p>
                    @endif

                    <p>Detail: {{ $viewproduct->product_detail }}</p>
                    <p>Price: {{ $viewproduct->product_price }}</p>
                    <p>Posted Date: {{ $viewproduct->created_at }}</p>
                </div>
            </div>
        @endif
    </div>

@endsection