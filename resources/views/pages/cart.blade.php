@extends('layouts.main')
@section('content')

<div class="container mt-5">
    <div class="d-flex">
        <h2>รถเข็นของคุณ</h2>
        <a class="btn btn-success ml-3" style="height:40px" href="{{route('stores.index')}}">เลือกสินค้าต่อ</a>
    </div>

    <div class="d-flex">
        <div class="d-flex">
        </div>
        <div>
            <hr>
            @foreach($carts as $cart)
            <div class="d-flex" style="height:80px;top: 50%;">
                <div style="width:80px;">
                    <img class="btn" src="{{$cart->product_img_path}}" style="width:80px;">
                </div>
                <div style="width:300px;">
                    <h4 style="font-weight: bold;white-space: nowrap;width: 250px;overflow: hidden;text-overflow: ellipsis;padding-top:5px;" class="ml-3 mb-1">
                        {{$cart->product_name}}
                    </h4>
                    <p class="ml-3 mb-1" style="font-size:16px;color:blue;font-weight: bold;">
                        ประเภท: {{$cart->product_primary_type}} สี: {{$cart->color}}
                    </p>
                    <p class="ml-3 mb-1" style="font-size:14px;color:red;font-weight: bold;">
                        @if($cart->amount==0) สินค้าหมด
                        @else คงเหลือ: {{$cart->qty}} ชิ้น
                        @endif
                    </p>
                </div>
                <div style="width:150px;">
                    <h2 id='price{{$cart->product_id}}' style="color:#ff1e00;" class="pt-3">฿{{$cart->price}}</h2>
                </div>

                <div style="width:150px;">
                    <div class="input-group number-spinner pt-3">
                        <span class="input-group-btn">
                            <button name="{{$cart->product_id}}" style="font-size: 10px;" class="btn btn-default btn-outline-success" onclick="onClickMinus(event)">-</button>
                        </span>
                        <input onchange="sumTotal(this)" onkeyup="onKeyUp(event, {{$cart->qty}})" name='{{$cart->product_id}}' id='{{$cart->product_id}}' max="{{$cart->qty}}" min="1" style="font-size: 20px; width:50%; height:30px" type="text" class="form-control text-center" value="{{$cart->amount}}">
                        <span class="input-group-btn">
                            <button name="{{$cart->product_id}}" style="font-size: 10px;" class=" btn btn-default btn-outline-success" onclick="onClickPlus(event,{{$cart->qty}})">+</button>
                        </span>
                    </div>
                </div>
                <div style="width:100px;" class="pt-3 pl-4">
                    <form action="{{route("cart.destroy",['id'=>$cart->product_id])}}" method="POST">
                        @method('delete')
                        @csrf
                        <td> <button action="submit" class="btn btn-danger tr-1 tl-1" style="font-size: 12px; border-radius: 8px;">ลบ</button></td>
                    </form>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
        <div class="d-flex pl-4">
            <div class="pt-3 pl-2" style="border: 1px solid #e0dada;border-radius: 12px;width:350;">
                <h4>ที่อยู่จัดส่ง</h4>
                <p style="font-weight: bold;color:blue;" class="mb-0">ชื่อ:
                    <p class="mb-1">{{$address->receiver}}</p>
                    <p style="font-weight: bold;color:blue;" class="mb-0">เบอร์โทรศัพท์:
                        <p class="mb-1">{{$address->telephone}}</p>
                        <p style="font-weight: bold;color:blue;" class="mb-0">ที่อยู่:
                            <p class="mb-1">{{$address->address}}</p>
                            <a class="mb-1" href="{{ route('address.edit', ['address' => $address->no]) }}">แก้ไขที่อยู่ปัจจุบัน</a>
                        </p>
                    </p>
                </p>
                <div class="d-flex">
                    <h4 class="pr-1">ราคารวม:
                        <h4 id="total" class="pl-1 pr-1">{{$sum}}</h4>
                        <h4 class="pl-1"> บาท</h4>
                    </h4>
                </div>

                <div style="padding-left:180px">
                    <a class="btn btn-primary" style="height:40px" href="{{ route('checkout') }}">Check out</a>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section('script')
    <script src="{{asset('storage/js/cart.js')}}"></script>
    @endsection
