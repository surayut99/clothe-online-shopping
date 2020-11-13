@extends('layouts.main')

@section('content')
<div class="bg-lr" style="padding: 90px;">
  <div class="container">
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
      <div class="bg-light mr-md-3 pt-3 px-3 py-md-3 px-md-3">
        <img src="{{ asset($product->product_img_path)}}" style="height: 300px">
      </div>

      <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
        <h4 class="display-5">ชื่อสินค้า: {{ $product->product_name}}</h4>
        <h5 class="display-5">สี: {{ $product->color}}</h5>
        <h5 class="display-5">ไซซ์: {{ $product->size}}</h5>
        <h5 class="display-5">คงเหลือ: <span id="max">{{ $product->qty}}</span> ชิ้น</h5>
        <h5 class="display-5">ราคาต่อชิ้น: {{$product->price}} บาท</h5>

        <form action="{{route('addcart', ['id'=>$product->product_id])}}" method="post">
          @csrf

          <div class="input-group number-spinner mt-2">
            {{-- <span class="input-group-btn">
                            <button id="dec" style="font-size: 10px;" class="btn btn-default btn-outline-success">-<span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input name='qty' id='qty' style="font-size: 20px; width:50%; height:30px" type="text" class="form-control text-center" value="1">
                        <span class="input-group-btn">
                            <button id="inc" style="font-size: 10px;" class="btn btn-default btn-outline-success">+<span class="glyphicon glyphicon-plus"></span></button>
                        </span> --}}
            <span class="input-group-btn">
              <button style="font-size: 10px;" class="btn btn-default btn-outline-success" data-dir="dwn">-<span class="glyphicon glyphicon-minus"></span></button>
            </span>
            <input name='qty' id='qty' style="font-size: 20px; width:50%; height:30px" type="text" class="form-control text-center" value="1">
            <span class="input-group-btn">
              <button style="font-size: 10px;" class="btn btn-default btn-outline-success" data-dir="up">+<span class="glyphicon glyphicon-plus"></span></button>
            </span>

          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success mt-2">หยิบใส่รถเข็น</button></div>
        </form>
      </div>
    </div>
  </div>

  <div class="container mb-3">
    <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
      <div class="media">
        <img src="{{asset('storage/pictures/icon/default_store.png')}}" class="mr-3" width="100px">
        <div>
          <h5 class="mt-2">{{$store->store_name}}</h5>
          <h6>{{ $store->store_description }}</h6>
          <a class="btn btn-primary" href="{{route('stores.show', ['store'=>$store->store_id])}}">ไปหน้าร้านค้า</a>
        </div>

      </div>
    </div>
  </div>

  <div class="container mb-3">
    <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
      <h5>รายละเอียดสินค้า</h5>
      <p class="lead">{{$product->product_description}}</p>
    </div>
  </div>

  <div class="container mb-3">
    <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
      <h5>คะแนนของสินค้า</h5>
    </div>
  </div>

</div>
@endsection

@section('script')
<script>
  $(document).on('click', '.number-spinner button', function(event) {
    event.preventDefault()
    var btn = $(this)
      , oldValue = btn.closest('.number-spinner').find('input').val().trim()
      , newVal = 0;
    var max = parseInt($('span#max').text())
    if (btn.attr('data-dir') == 'up') {
      if (parseInt(oldValue) + 1 <= max) {
        newVal = parseInt(oldValue) + 1;
      } else {
        newVal = max;
      }
    } else {
      if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    btn.closest('.number-spinner').find('input').val(newVal);
  });

</script>
@endsection
