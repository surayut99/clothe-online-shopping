@extends('layouts.main')
@section('content')
<div class="container">
    <h2 class="text-center text-light">ทำการสั่งซื้อ</h2>
    <div class="container">
        <div class="bg-light py-md-3 px-md-5 mb-3">
            <h5>ที่อยู่ในการจัดส่ง</h5>
        </div>

        <div class="bg-light py-md-3 px-md-5 mb-3">
            <h5>สินค้าที่สั่งซื้อ</h5>
            <table class="table">
                <thead>
                    <tr style="background-color: #AED6F1">
                        <th scope="col"></th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคาต่อหน่วย</th>
                        <th scope="col">จำนวน</th>
                    </tr>
                </thead>
                <tbody style="background-color: #D1F2EB">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-right">ยอดสั่งซื้อทั้งหมด:</p>
        </div>

        <div class="bg-light py-md-3 px-md-5 mb-3">
            <h5>วิธีการชำระเงิน</h5>
            <div class="accordion" id="accordionExample">
                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#banks" aria-expanded="true" aria-controls="banks">ชำระผ่านบัญชีธนาคาร</button>
                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#destination" aria-expanded="false" aria-controls="destination">ชำระเงินปลายทาง</button>
                <div class="collapse" id="banks" data-parent="#accordionExample">
                    <br>
                    <p>ชำระผ่านบัญชีธนาคาร</p>
                    <p>ไทยพาณิชย์ : 111-221100-2</p>
                    <p>กสิกรไทย : 333-220100-4</p>
                    <p>กรุงไทย : 431-000456-1</p>
                    <p>เมื่อชำระเงินแล้วกรุณาแนบหลักฐานการโอน</p>
                </div>
                <div class="collapse" id="destination" data-parent="#accordionExample">
                    <br>
                    <p>ชำระเงินปลายทาง</p>
                </div>
            </div>

        </div>
        <div class="bg-light py-md-3 px-md-5 mb-3 text-right mb-5">
            <p>ยอดรวมสินค้า: </p>
            <p>รวมการจัดส่ง: </p>
            <p>การชำระเงินทั้งหมด: </p>
        </div>
        <a class="btn btn-primary float-right" href="">ยืนยันการชำระเงิน</a>
    </div>
</div>

@endsection
