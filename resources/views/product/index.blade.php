@extends('layouts.main')



@section('content')
<div class="container">
    <h1>รายการสินค้าทั้งหมด</h1>
    <div class="d-flex overflow-h">
        @foreach($products as $product)
        <div class="item card mr-3 my-1 p-2 bordered-rounded" style="background-color: whitesmoke">
            <a href="{{ route('products.show',['product'=>$product->product_id]) }}" class="mx-auto pt-2" style='color:red'>
                <img src="{{asset($product->product_img_path)}}" width="150px">
                <div style="color: black; padding-top: 20px">
                    <h3 style="text-align: center">{{$product->product_name}}</h3>
                    <hr>
                </div>
            </a>
            <h6 style='color:blue'>ราคา {{$product->price}} บาท</h6>
            <p style="text-align: center">{{$product->product_description}}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
