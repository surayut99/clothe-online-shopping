@extends('layouts.main')


@section( 'content')
<div class='container'>
    <h1>การจัดการสินค้า</h1>
    <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight sp-flex space-bottom">
        @foreach($products as $product)
        <div style="background-color: #f9f7cf; border-radius:10px; width:25vw" class="p-3 text-center">
            <img src="{{asset($product->product_img_path)}}" height="200px">
            <div style="padding-top: 20px;" class="shrink-text">
                <h4 class="rounded" style="color:black;">{{$product->product_name}}</h4>
            </div>
            <hr>
            <div style="color:black; min-height:100px">
                <h6 style="color:blue">ราคา {{$product->price}} บาท </h6>
                <label>จำนวน {{$product->qty}} ชิ้น</label>
                <label>สี{{$product->color}} ไซซ์ {{$product->size}}</label> <br>
                <label class="shrink-text">{{$product->product_description}}</label>
            </div>
<<<<<<< HEAD
            <div class="text-right">
                <a href="{{route('products.edit',['product'=>$product->product_id])}}" class="btn btn-outline-info">แก้ไข</a>
=======
            <div class="text-right d-flex justify-content-end space-left">
                <a href="{{route('products.edit',['product'=>$product->product_id])}}" class="btn btn-outline-info">แก้ไข</a>
                <button onclick="collapseDelOpt()" id="deleteOpt" class="btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">ลบสินค้านี้</button>


                {{-- <a href="{{route('products.destroy',['product'=>$product->product_id])}}" class="btn btn-outline-danger">ลบ</a> --}}
>>>>>>> Product-feature
            </div>
            <form id="collapseExample" class="mt-3 collapse text-right" action="{{route('products.destroy',['product'=>$product->product_id])}}" method="post">
                @method('delete')
                @csrf
                <label style="color:black">คุณต้องการลบสินค้านี้ใช่หรือไม่</label>
                <div>
                    <button type="submit" class="btn btn-danger">ใช่</button>
                    <button onclick="collapseDelOpt()" class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">ไม่</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('storage/js/confirmDeleteProduct.js') }}"></script>
@endsection
