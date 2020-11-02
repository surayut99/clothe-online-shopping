@extends('layouts.main')

@section('content')
    <div style="background-color: #fffaf3; min-height: 100vh;font-family: 'Bai Jamjuree', sans-serif; padding-top:70px">

<<<<<<< HEAD
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
=======
        <div style="padding-top: 30px;" class="container d-flex justify-content-between">
            <div class="d-flex">
                <a class="btn" style="background-color:RGB(242,137,108)" href="{{ route('product_list.index') }}">เปิดร้านค้า!</a>
            </div>
>>>>>>> master

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
                <button id="edit-profile" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#profile-form" aria-controls="profile-form" aria-expanded="false"  onclick="showform(),checkinfo()">แก้ไขข้อมูลส่วนตัว</button>
                <div class="collapse" id="profile-form">
                    <br>
                    <label>ชื่อ: </label>
                    <input  class="form-control" id="changeName"></input>
                    <label>เบอร์: </label>
                    <input class="form-control" id="changeTel"   type='number'></input>
                    <br>
                    <button class="btn btn-primary" onclick="document.getElementById('changeName').value = '' ;document.getElementById('changeTel').value = ''  ">Confirm</button>
                </div>
            </div>
            <hr>
            <div>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#address-form" aria-expanded="false" aria-controls="address-form">เพิ่มที่อยู่สำหรับจัดส่ง</button>
                <div class="collapse" id="address-form">
                    <br>
                    <textarea class="form-control" id="myInput"></textarea>
                    <br>
                    <button class="btn btn-primary" onclick="document.getElementById('myInput').value = ''">Confirm</button>
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
