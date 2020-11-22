@extends('layouts.main')



@section('content')
<div class="container">
    <h1>รายการสินค้าทั้งหมด</h1>
    <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight sp-flex space-bottom">
        @foreach($products as $product)
        <div style="background-color: #f9f7cf; border-radius:10px; width:25vw" class="p-3 text-center">
            <a href="{{ route('products.show',['product'=>$product->product_id]) }}" style="color:maroon">
                <img src="{{asset($product->product_img_path)}}" height="200px">
            </a>
            <div style="padding-top: 20px;" class="shrink-text">
                <h4 class="rounded" style="color:black;">{{$product->product_name}}</h4>
            </div>
            <hr>
            <div style="color:black">
                <h6 style="color:blue">ราคา {{$product->price}} บาท </h6>
                <label class="shrink-text">{{$product->product_description}}</label>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
