@extends('layouts.main')
@section('content')
<div class="container">
    @if($store->user_id==Auth::user()->id)
    <h1>รายการสั่งซื้อสินค้า</h1>
    <hr>
    <div>
        @foreach($orders as $order)
        <div class="d-flex" style="height:100px;top: 50%;">
            <div style="width:80px;">
                <img class="btn" src="{{asset($order->product_img_path)}}" style="width:80px;">
            </div>
            <div style="width:800px;">
                <h4 style="font-weight: bold;white-space: nowrap;padding-top:5px;" class="ml-3 mb-1">
                    {{$order->product_name}}
                </h4>
                <p class="ml-3 mb-1" style="font-size:14px;color:red;font-weight: bold;">
                    ราคาทั้งหมด: {{$order->total_cost}} บาท
                </p>
                <p class="ml-3 mb-1" style="font-size:14px;color:blue;">
                    {{$order->recv_name}} {{$order->recv_address}} {{$order->recv_tel}}
                </p>
                <p class="ml-3 mb-1" style="font-size:14px;color:violet;">
                    จำนวนสั่งซื้อ: {{$order->qty}} ราคาทั้งหมด: {{$order->total_cost}} บาท จัดส่งแบบ {{$order->shipment_type}} ชำระเงิน {{$order->payment_type}}
                </p>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
    @endif
</div>
@endsection
