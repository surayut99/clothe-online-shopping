@extends ('layouts.main')

@section('content')
<div class="container">
    <div class="media">
        <img src="{{asset('storage/pictures/icon/default_store.png')}}" class="mr-3" width="150px">
        <div class="media-body mt-5">
            <h5 class="mt-0">{{$store->store_name}}</h5>
            <h6>{{ $store->store_description }}</h6>
            @if($store->user_id==Auth::user()->id)
            <div class="d-flex flex-row mt-2">
                <a href="{{route('stores.edit',['store'=>$store->store_id])}}" class="btn btn-warning">แก้ไขร้านค้า</a>
            </div>
            @endif
        </div>
    </div>
    <hr>
    <div>
        <h4>รายการสินค้าในร้านค้า</h4>
        <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight">
            @foreach($products as $product)
            <div style="background-color: #f9f7cf; border-radius:10px" class="p-3 text-center">
                <a href="{{ route('products.show',['product'=>$product->product_id]) }}" style="color:maroon">
                    <img src="{{asset($product->product_img_path)}}" width="175px">
                    <div style="padding-top: 10px;">
                        <h4 class="rounded pt-1" style="background-color:#f5b461; color:black; height:35px">{{$product->product_name}}</h4>
                    </div>
                </a>
                <hr>
                <div style="color:black">
                    <p>ราคา {{$product->price}} บาท <br> {{$product->product_description}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
