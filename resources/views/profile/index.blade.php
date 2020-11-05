@extends('layouts.main')

@section('content')
<div class="bg-orange" style="min-height: 100vh;font-family: 'Bai Jamjuree', sans-serif; padding-top:70px">

  <div style="padding-top: 30px;" class="container d-flex justify-content-between">
    <div class="d-flex">
      <a class="btn btn-success" href="{{ route('product_list.index') }}">เปิดร้านค้า!</a>
    </div>

  </div>

  <hr class="container">

  <div class="container">
    <h1 style="border: 2px ">ข้อมูลส่วนตัว</h1>

    <div class="d-flex bd-highlight">
      <div class="p-2 bd-highlight mx-3">
        <img src="{{ asset(Auth::user()->profile_photo_path) }}" width="100" height="100">
      </div>
      <div class="p-2 bd-highlight mx-3">
        <h4>ชื่อ: {{Auth::user()->name}}</h4>
        <h4>อีเมล: {{Auth::user()->email}}</h4>
        <h4>เบอร์โทร: {{Auth::user()->telephone}}</h4>
      </div>
    </div>

    <a href="{{route('edit-profile')}}" class="btn btn-warning border border-secondary" type="button">แก้ไขข้อมูลส่วนตัว</a>

    <hr>

    <h1 style="border: 2px ">ที่อยู่</h1>

    <div class="my-2">
      @foreach($addrs as $addr)
      <div class="d-flex">
        <div class="card my-1 p-2 bordered-rounded" style="width: 20vw">

          <p class="text-bold"><span>ชื่อ: </span> {{$addr->receiver}} </p>
          <p><span>เบอร์โทร: </span>{{$addr->telephone}}</p>
          <p><span>ที่อยู่: </span>{{$addr->address}}</p>
          <div class="d-flex">

            {{-- set as default address --}}
            @if(!$addr->default)
            <form action="{{route('changeDefaultAddress', ['address' => $addr->no])}}" method="post">
              @method('put')
              @csrf
              <button style="width: 135px" class="btn btn-primary">ตั้งเป็นค่าเริ่มต้น</button>
            </form>
            @else
            <button style="width: 135px" disabled class="btn btn-success">ที่อยู่ปัจจุบัน</button>
            @endif

            {{-- edit address --}}
            <form class="ml-1" action="{{ route('address.update', ['address'=> $addr->no])}}" method="post">
              @method('put')
              @csrf
              <a href="{{ route('address.edit', ['address' => $addr->no]) }}" class="btn btn-warning">แก้ไขที่อยู่</a>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div>
      <a href="{{ route('address.create') }}" class="btn btn-primary">เพิ่มที่อยู่สำหรับจัดส่ง</a>
    </div>

    <hr>

    <div class="d-flex" id="between-content">
      <button class="btn btn-primary">รายการที่ต้องชำระ</button>
      <button class="btn btn-primary">รายการที่ต้องได้รับ</button>
      <button class="btn btn-primary">ประวัติการซื้อ</button>
    </div>

    <div class="border border-warning rounded" style="margin-top:10px ;height: 200px;">

    </div>
  </div>
  @endsection
