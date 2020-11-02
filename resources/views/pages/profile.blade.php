@extends('layouts.main')

@section('content')
<div class="bg-orange" style="min-height: 100vh;font-family: 'Bai Jamjuree', sans-serif; padding-top:70px">
  <div style="padding-top: 30px;" class="container d-flex justify-content-between">
    <div class="d-flex">
      <a class="btn" style="background-color:RGB(242,137,108)" href="{{ route('product_list.index') }}">เปิดร้านค้า!</a>
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
      <button class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button>
    </div>
    <hr>
    <div class="d-flex">
      <button class="btn btn-primary">เพิ่มที่อยู่สำหรับจัดส่ง</button>
    </div>
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
