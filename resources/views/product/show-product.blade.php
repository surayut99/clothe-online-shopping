@extends ('layouts.main')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="media">
            <img src="{{asset('storage/pictures/store.png')}}" class="mr-3" width="150px">
            <div class="media-body mt-5">
                <h5 class="mt-0">{{$stores[0]->store_name}}</h5>
                <h6>{{ $stores[0]->store_description }}</h6>
            </div>
        </div>
        <hr>
        <div>
            <h4>รายการสินค้าทั้งหมด</h4>
            <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight">
                @foreach($products as $product)
                    <div style="background-color: white;" class="p-3" >
                    <a href="{{ route('product_detail',['id'=>$product->product_id]) }}">
                        <img src="{{asset($product->product_img_path)}}" width="150px" href>
                        <div style="color: black; padding-top: 20px">
                            <p style="text-align: center">{{$product->product_description}}</p>
                        </div>
                    </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
