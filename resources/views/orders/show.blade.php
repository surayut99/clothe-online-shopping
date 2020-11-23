@extends('layouts.main')

@section( 'content')
<div class="container my-5">
    <div style="background-color:whitesmoke" class="rounded p-2">
        <h1>รายละเอียดรายการสั่งซื้อสินค้า</h1>
        <h4>หมายเลขสั่งซื้อ {{$order->order_id}}</h4>
        <h4>สั่งซื้อเมื่อ {{$order->created_at}}</h4>
        <h4>หมดอายุเมื่อ {{$order->expired_at}}</h4>
        <h4>ชื่อผู้รับ {{$order->recv_name}}</h4>
        <hr>
        <h4>ประเภทการจัดส่ง {{$order->shipment_type}}</h4>
        <h4>ประเภทการชำระเงิน {{$order->payment_type}}</h4>
        @if($order->status=='deliveried')
        <h4>เลขพัสดุ {{$order->track_id}}</h4>
        @endif
    </div>
    <hr>
    <div class='d-flex justify-content-start space-left space-right space-bottom rounded p-2' style="background-color:whitesmoke">
        <div>
            @php
            $total = 0
            @endphp
            @foreach($products as $product)
            <h4>ชื่อ {{$product->product_name}}</h4>
            <h4>จำนวน {{$product->qty}} ชิ้น</h4>
            <h4>ราคา {{$product->price}} บาท</h4>
            @php $total +=$product->qty*$product->price
            @endphp
            <hr>
            @endforeach
            <h4>ราคารวมทั้งสิ้น {{$total}} บาท</h4>
        </div>
        @if($payment)
        <div>
            <h4>{{$payment->bank_name}}</h4>
            <img src="{{asset($payment->img_path)}}" alt="" style="height:300px">
            @if($order->status=='verifying' && $owner->user_id==Auth::user()->id)
            <form action="{{route('orders.accept',['order'=>$order->order_id])}}" class="my-3 d-flex justify-content-end space-left" method="post">
                @method('put')
                @csrf
                <button class="btn btn-success">ยืนยัน</button>
            </form>
            <form action="{{route('orders.update',['order'=>$order->order_id])}}" class="my-3 justify-content-end space-left text-right" method="post">
                @method('put')
                @csrf
                <div class="mb-2">
                    <button class="btn btn-danger mb-2">ปฏิเสธ</button>
                </div>
                <textarea name="store_comment" id="" cols="30" rows="10" placeholder="ความคิดเห็นในการปฏิเสธการชำระเงิน"></textarea>
            </form>
            @elseif($order->status=='verified')
            <h4 class='text-success mt-2 text-right'>ยืนยันการชำระเงินแล้ว</h4>
            <form action="{{route('orders.trackId',['order'=>$order->order_id])}}" class='text-right' method='post'>
                @method('put')
                @csrf
                <input type="text" name="track_id" id="" placeholder="เลขพัสดุ" class="form-control @error('track_id') is-invalid @enderror">
                <button class=" my-2 btn btn-success">บันทึกข้อมูล</button>
                @error('track_id')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </form>
            @elseif($order->status=='cancelled')
            <h4 class='text-danger mt-2 text-right'>การชำระเงินถูกปฏิเสธ</h4>
            <p class='text-danger mt-2 text-right'>{{$order->store_comment}}</p>
            <p class='text-danger mt-2 text-right'>{{$order->updated_at}}</p>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
