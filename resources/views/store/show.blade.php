@extends ('layouts.main')

@section('content')
<div class="container">
    <div class="media">
        <img src="{{asset($store->store_img_path)}}" class="mr-3" width="150px">
        <div class="media-body mt-5">
            <h3 class="mt-0">{{$store->store_name}}</h3>
            <h5>{{ $store->store_description }}</h5>
            @if($store->user_id==Auth::user()->id)
            <div class="d-flex justify-content-end">
                <a href="{{route('stores.edit',['store'=>$store->store_id])}}" class="btn btn-warning mr-2">แก้ไขร้านค้า</a>
                <a href="{{route('products.create')}}" class="btn btn-primary mr-2" id="addProduct">เพิ่มรายการสินค้า</a>
                <a href="{{route('product_management',['store'=>$store->store_id])}}" class="btn btn-primary mr-2" id="addProduct">การจัดการสินค้า</a>
            </div>
            @endif
        </div>
    </div>
    <hr>
    <div>
        <h4>รายการสินค้าในร้านค้า</h4>
        <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight">
            @foreach($products as $product)
            <div style="background-color: whitesmoke; border-radius:10px; width:30vw" class="p-3 text-center">
                <a href="{{ route('products.show',['product'=>$product->product_id]) }}" style="color:maroon">
                    <img src="{{asset($product->product_img_path)}}" height="200px">
                </a>
                <div style="padding-top: 20px;">
                    <h4 class="rounded" style="color:black;">{{$product->product_name}}</h4>
                </div>
                <hr>
                <div style="color:black">
                    <h6 style="color:blue">ราคา {{$product->price}} บาท </h6>
                    <label>{{$product->product_description}}</label>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
