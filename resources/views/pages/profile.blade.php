@extends('layouts.main')

@section('content')
<div class="bg-orange" style="min-height: 100vh;font-family: 'Bai Jamjuree', sans-serif; padding-top:70px">

  <div style="padding-top: 30px;" class="container d-flex justify-content-end">
    <div class="d-flex">
        @if(sizeof($stores)==0)
            <a href="{{ route('create_store.create') }}" class="btn" style="background-color:RGB(242,137,108)">เปิดร้านค้า!</a>
        @else
            <h5 class="mr-3 mt-2">ร้านค้าของคุณ</h5>
{{--            @foreach($stores as $store)--}}
            <a href="{{ route('product_list.index') }}" class="btn" style="background-color:RGB(242,137,108)"> ไปยังร้านค้าของคุณ!</a>
{{--            @endforeach--}}
        @endif
    </div>

  </div>

  <hr class="container">

  <div class="container">
    <h1 style="border: 2px ">ข้อมูลส่วนตัว</h1>

    <div class="d-flex bd-highlight">
      <div class="p-2 bd-highlight mx-3">
        <img src="https://www.flaticon.com/svg/static/icons/svg/2922/2922510.svg" width="100" height="100">
      </div>
      <div class="p-2 bd-highlight mx-3">
        <h4>ชื่อ: {{Auth::user()->name}}</h4>
        <h4>อีเมล: {{Auth::user()->email}}</h4>
        <h4>เบอร์โทร: {{Auth::user()->telephone}}</h4>
      </div>
    </div>

    <div>
      <button id="edit-profile" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#profile-form" aria-controls="profile-form" aria-expanded="false" onclick="showform(),checkinfo()">แก้ไขข้อมูลส่วนตัว</button>
      <form style="width: 20vw" class="collapse" id="profile-form" action="{{ route('editProfile') }}" method=POST>
        @csrf
        <br>
        <label>ชื่อ: </label>
        <input value="{{Auth::user()->name}}" name="new_name" class="form-control" id="changeName">
        <label>เบอร์: </label>
        <input value="{{Auth::user()->telephone}}" name="new_tel" class="form-control" id="changeTel" type='string'>
        <br>
        <button type='submit' class="btn btn-primary">บันทึก</button>
      </form>
    </div>

    <hr>

    <h1 style="border: 2px ">ที่อยู่</h1>

    <div class="container my-2">
      @foreach($addrs as $addr)
      <div class="d-flex">
        <div class="card my-1 p-2 " style="width: 20vw">
          <p class="text-bold"> {{$addr->receiver}} </p>
          <p>{{$addr->telephone}}</p>
          <p>{{$addr->address}}</p>
          <div class="d-flex">
            @if(!$addr->default)
            <form action="{{route('changeDefaultAddress', ['address' => $addr->no])}}" method="post">
              @method('put')
              @csrf
              <button class="btn btn-primary">ตั้งเป็นค่าเริ่มต้น</button>
            </form>
            @else
            <button  disabled class="btn btn-success">ที่อยู่ปัจจุบัน</button>
            @endif

            {{-- edit address --}}
            <form class="ml-1" action="{{ route('address.update', ['address'=> $addr->no])}}" method="post">
              @method('put')
              @csrf
              <button class="btn btn-warning">แก้ไขที่อยู่</button>
            </form>

            {{-- delete address --}}
            <form class="mx-1 ml-auto" action="{{route('address.destroy', ['address' => $addr->no])}}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-danger ml-1">ลบ</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#address-form" aria-expanded="false" aria-controls="address-form">เพิ่มที่อยู่สำหรับจัดส่ง</button>
      <form action="{{ route('address.store') }}" style="width: 30vw" class="collapse" id="address-form" method="POST">
        @csrf
        <br>
        <label>ชื่อผู้รับ</label>
        <input class="form-control" type="text" name="new_receiver">
        <label>เบอร์โทร</label>
        <input class="form-control" type="text" name="new_tel">
        <label>ที่อยู่</label>
        <textarea class="form-control" name="new_address"></textarea>
        <br>
        <button type=submit class="btn btn-primary">บันทึก</button>
      </form>
      <hr>
      <div class="d-flex" id="between-content">
        <button class="btn btn-primary">ตะกร้าของฉัน</button>
        <button class="btn btn-primary">รายการที่ต้องชำระ</button>
        <button class="btn btn-primary">รายการที่ต้องได้รับ</button>
        <button class="btn btn-primary">ประวัติการซื้อ</button>
      </div>

      <div class="border border-warning rounded" style="margin-top:10px ;height: 200px;">

      </div>
    </div>
  </div>
  @endsection
