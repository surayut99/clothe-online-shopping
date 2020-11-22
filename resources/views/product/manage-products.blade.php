@extends('layouts.main')


@section( 'content')
<div class='container' style="padding-top:100px">
    <h1>การจัดการสินค้า</h1>
    <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight sp-flex space-bottom">
        @foreach($products as $product)
        <div style="background-color: #f9f7cf; border-radius:10px; width:25vw" class="p-3 text-center">
            <img src="{{asset($product->product_img_path)}}" style="object-fit: cover;width:200px;height:200px">
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
            <div class="text-right d-flex justify-content-end space-left">
                <a href="{{route('products.edit',['product'=>$product->product_id])}}" class="btn btn-outline-info">แก้ไข</a>
                {{-- <a href="{{route('products.destroy',['product'=>$product->product_id])}}" class="btn btn-outline-danger">ลบ</a> --}}

                <form action="{{route('products.destroy',['product'=>$product->product_id])}}" method="post">
                    @method('delete')
                    @csrf
                    <div>
                        <button type="submit" class="btn btn-outline-danger">ลบสินค้านี้</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('storage/js/confirmDeleteProduct.js') }}"></script>
@endsection
