@extends('layout.main')

@section('title')
    this is searching section
@endsection

@section('content')
        {{--{{ dd($clothingdata) }}--}}

    <ul>
        @foreach($clothingdata as $data)
            <li>Product ko name: {{ $data->product_name }}</li>
            <li>Product ko name: {{ $data->product_price }}</li>
            <li>Product ko name: {{ $data->product_detail }}</li>
            <li>Product ko name: <img src="{{ asset('uploads/products/'.$data->product_image) }}" width="100px" height="100px" /></li>
        @endforeach
    </ul>
@endsection