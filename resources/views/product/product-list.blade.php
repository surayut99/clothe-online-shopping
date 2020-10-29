@extends ('layouts.main')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div>
            <div class="media">
                <img src="storage/pictures/store.png" class="mr-3" width="150px">
                <div class="media-body mt-5">
                    <h5 class="mt-0">Store Name</h5>
                    <h6>รายละเอียดต่าง ๆ ของร้านค้า</h6>
                </div>
            </div>
        </div>
        <hr>

        <div>
            <h4>รายการสินค้าทั้งหมด</h4>
{{--            <h4>แสดงรายการ</h4>--}}
            <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight">
                <p>what</p>
                @foreach($products as $product)
                    <div style="background-color: white;" class="p-3" >
                        <img src="{{asset($product->product_img_path)}}" width="150px">
                        <div style="color: black; padding-top: 20px">
                            <p style="text-align: center">{{$product->product_description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
