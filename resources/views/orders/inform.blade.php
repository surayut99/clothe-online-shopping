@extends('layouts.main')

@section('content')
<div class="mt-5 container">
  <div class="card py-3" style="background-color: pink">
    <div class="d-flex justify-content-around">
      <div class="py-1">
        <label class="btn btn-outline-info" for="inpimg">อัพโหลดหลักฐานการชำระเงิน</label>
        <input type="file" accept="image/png, image/jpeg" name="inpImg" id="inpImg" hidden>
        <input type="text" id="bank_name" class="form-control">
      </div>

      <div class="py-1">
        <table>
          <tbody>
            <tr>
              <td>หมายดลขคำสั่งซื้อ </td>
              <td>{{$order->order_id}}</td>
            </tr>
            <tr>
              <td>สั่งซื้อเมื่อ </td>
              <td>{{$order->created_at}}</td>
            </tr>
            <tr>
              <td>สิ้นสุดการชำระเมื่อ </td>
              <td>{{$order->expired_at}}</td>
            </tr>
          </tbody>
        </table>
        <hr>
        <table style="min-width: 500px">
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>
                <img src="{{asset('storage/pictures/icon/default_products.png')}}" style="height: 80px" alt="">
              </td>
              <td>
                <strong>{{$product->product_name}}</strong>
              </td>
              <td>
                <strong>{{$product->qty}} ชิ้น</strong>
              </td>
              <td>
                <strong> {{$product->qty}} บาท/ชื้น</strong>
              </td>
              <td>
                <strong> รวม {{$product->qty}} บาท</strong>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
