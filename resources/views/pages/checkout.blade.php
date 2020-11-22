@extends('layouts.main')
@section('content')
<div class="container">
    <h2 class="text-center text-light">ทำการสั่งซื้อ</h2>
    <div class="container">
        <div class="bg-light py-md-3 px-md-5 mb-3">
            <h3 style="font-weight: bold">ยืนยันการสั่งซื้อสินค้า</h3>
        </div>

        <div class="bg-light py-md-3 px-md-5 mb-3">
            <h5 style="font-weight: bold">ที่อยู่การจัดส่ง</h5>
            <div>
                <div class="form-row">
                    <p style="font-weight: bold">ชื่อ : </p>
                    <p class="form-group col-md-4">{{$address->receiver}}</p>
                    <p style="font-weight: bold">เบอร์โทร : </p>
                    <p class="form-group col-md-3">{{$address->telephone}}</p>
                </div>
                <div class="form-row">
                    <p style="font-weight: bold">ที่อยู่ : </p>
                    <p class="form-group col-md-4">{{$address->address}}</p>
                </div>
            </div>
        </div>

        <div class="bg-light py-md-3 px-md-5 mb-3">
            <h5>สินค้าที่สั่งซื้อ</h5>
            <table class="table">
                <thead>
                    <tr style="background-color: #AED6F1">
                        <th scope="col"></th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคาต่อหน่วย</th>
                        <th scope="col">จำนวน</th>
                    </tr>
                </thead>
                @foreach($carts as $cart)
                <tbody style="background-color: #D1F2EB">

                    <tr>
                        <th><img style="width:80px;" src="{{asset($cart->product_img_path)}}"></th>
                        <td>{{$cart->product_name}}</td>
                        <td>{{$cart->price}}</td>
                        <td>{{$cart->amount}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <p class="text-right">ยอดสั่งซื้อทั้งหมด: {{$sum}}</p>
        </div>



        {{-- <div class="bg-light py-md-3 px-md-5 mb-3">--}}
        {{-- <h5>วิธีการชำระเงิน</h5>--}}
        {{-- <div class="accordion" id="accordionExample">--}}
        {{-- <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#banks" aria-expanded="true" aria-controls="banks">ชำระผ่านบัญชีธนาคาร</button>--}}
        {{-- <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#destination" aria-expanded="false" aria-controls="destination">ชำระเงินปลายทาง</button>--}}
        {{-- <div class="collapse" id="banks" data-parent="#accordionExample">--}}
        {{-- <br>--}}
        {{-- <p>ชำระผ่านบัญชีธนาคาร</p>--}}
        {{-- <p>ไทยพาณิชย์ : 111-221100-2</p>--}}
        {{-- <p>กสิกรไทย : 333-220100-4</p>--}}
        {{-- <p>กรุงไทย : 431-000456-1</p>--}}
        {{-- <p>เมื่อชำระเงินแล้วกรุณาแนบหลักฐานการโอน</p>--}}
        {{-- </div>--}}
        {{-- <div class="collapse" id="destination" data-parent="#accordionExample">--}}
        {{-- <br>--}}
        {{-- <p>ชำระเงินปลายทาง</p>--}}
        {{-- </div>--}}
        {{-- </div>--}}

        {{-- </div>--}}

        <div>
            <div class="form-row">
                <div class="form-group col-md-6 bg-light py-md-3 px-md-5 mb-3">
                    <div>
                        วิธีการชำระเงินที่ต้องการ
                    </div>
                    <br>
                    <div>
                        <select name="payment_type" id="" class="form-control">
                            @foreach($payment_types as $payment_type)
                            <option value="{{$payment_type}}">{{$payment_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6 bg-light py-md-3 px-md-5 mb-3">
                    <div>
                        วิธีการจัดส่งสินค้าที่ต้องการ
                    </div>
                    <br>
                    <div>
                        <select name="shipment_type" id="" class="form-control">
                            @foreach($shipment_types as $shipment_type)
                            <option value="{{$shipment_type}}">{{$shipment_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-light py-md-3 px-md-5 mb-3 text-right mb-5">
            <p>ยอดรวมสินค้า: {{$sum}}</p>
            {{-- <p>รวมการจัดส่ง: </p>--}}
            {{-- <p>การชำระเงินทั้งหมด: </p>--}}
        </div>
        <a class="btn btn-primary float-right" href="{{ route('save_order') }}">ยืนยันการชำระเงิน</a>
    </div>
</div>

@endsection
