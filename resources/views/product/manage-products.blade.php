@extends('layouts.main')


@section( 'content')
<div class='container'>
    <h1>การจัดการสินค้า</h1>
    <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight">
        @foreach($products as $product)
        <div style="background-color: #f9f7cf; border-radius:10px; width:30vw" class="p-3 text-center">
            <img src="{{asset($product->product_img_path)}}" height="200px">
            <div style="padding-top: 20px;">
                <h4 class="rounded" style="color:black;">{{$product->product_name}}</h4>
            </div>
            <hr>
            <div style="color:black">
                <h6 style="color:blue">ราคา {{$product->price}} บาท </h6>
                <label>{{$product->product_description}}</label>
            </div>
            <div class="text-right">
                <a href="{{route('products.edit',['products'=>$product->product_id])}}" class="btn btn-outline-info">แก้ไข</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
