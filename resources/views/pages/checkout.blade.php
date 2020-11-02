@extends('layouts.main')
@section('content')
    <div class="bg-lr" style="padding-top: 90px;">
        <h2 class="text-center text-light">ทำการสั่งซื้อ</h2>
        <div class="container">
            <div class="bg-light py-md-3 px-md-5 mb-3">
                <h5>ที่อยู่ในการจัดส่ง</h5>
                <p>....</p>
            </div>

            <div class="bg-light py-md-3 px-md-5 mb-3">
                <h5>สินค้าที่สั่งซื้อ</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคาต่อหน่วย</th>
                        <th scope="col">จำนวน</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-right">ยอดสั่งซื้อทั้งหมด:</p>
            </div>

            <div class="bg-light py-md-3 px-md-5 mb-3">
                <h5>วิธีการชำระเงิน</h5>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#banks" aria-controls="profile-form" aria-expanded="false"  onclick="showform(),checkinfo()">ชำระผ่านบัญชีธนาคาร</button>
                <button class="btn btn-info" type="button">ชำระเงินปลายทาง</button>
                <div class="collapse" id="banks">
                    <br>
                    <p>ไทยพาณิชย์ : 111-221100-2</p>
                    <p>กสิกรไทย : 333-220100-4</p>
                    <p>กรุุงไทย : 431-000456-1</p>
                    <p>เมื่อชำระเงินแล้วกรุณาแนบหลักฐานการโอน</p>
                </div>
            </div>
            <div class="bg-light py-md-3 px-md-5 mb-3 text-right">
                <p>ยอดรวมสินค้า: </p>
                <p>รวมการจัดส่ง: </p>
                <p>การชำระเงินทั้งหมด: </p>
                <a class="btn btn-primary float-right" href="" >Check out</a>
            </div>
    </div>
