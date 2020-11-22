@extends('layouts.main')

@section('content')
    <div style="margin-top: 30px">
        <h2 style="text-align: center">รายละเอียดการสั่งซื้อ</h2>

        <div class="container" style="padding-left:100px; padding-right:100px">
            <h5>รายการสินค้า</h5>

            @foreach($order_list as $ord)

                <h3>{{$ord['order']->store_name}}</h3>
                <div class="row">
                    @foreach($ord['products'] as $product)
                        <img src="{{asset($product->product_img_path)}}" alt="">
                        <h4>{{$product->product_name}}</h4>
                        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
                            <img src="" style="height: 100px;" class="mr-3">
                            <div>
                                <p>{{$product->price}} บาท</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h5>สั่งซื้อเมื่อ</h5>
                <p>{{$ord['order']->created_at}}</p>
                <h5>ชำระด้วย</h5>
                <p>{{$ord['order']->payment_type}}</p>
            @endforeach




            <h5>จัดส่งไปที่</h5>
{{--            <p>{{$user->name}}</p>--}}
{{--            <p>{{$address->address}}</p>--}}

            <h5>สรุป</h5>
            <div class="d-md-flex justify-content-between">
                <h5>ยอดรวม</h5>
                <p>1000 baht</p>
            </div>
            <div class="d-md-flex justify-content-between">
                <h5>ค่าจัดส่ง</h5>
                <p>50 baht</p>
            </div>
            <div class="d-md-flex justify-content-between">
                <h5>รวม</h5>
                <p>1050 baht</p>
            </div>
            <h4>หมายเลขคำสั่งซื้อ:</h4>

        </div>


    </div>
@endsection
