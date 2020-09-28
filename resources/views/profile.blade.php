@extends('layouts.main_profile')

@section('content')
    <div style="background-color: #fffaf3; min-height: 100vh;font-family: 'Bai Jamjuree', sans-serif;">
        <div style="padding-top: 30px;" class="container">
            <div class="text-right">
                <button class="btn" style="background-color:RGB(242,137,108)">เปิดร้านค้า!</button>
            </div>
            <hr>
            <h1 style="border: 2px ">Profile</h1>
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight mx-3">
                    <img src="https://www.flaticon.com/svg/static/icons/svg/2922/2922510.svg" width="100" height="100">
                </div>
                <div class="p-2 bd-highlight mx-3">
                    <h4>ชื่อ-สกุล : สุรุยุทธ์ บุญคล้าย</h4>
                    <h4>Display Name : Puen Cruft</h4>
                    <h4>Email: puencruft@gmail.com</h4>
                    <h4>Telephone: 12345567</h4>
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
