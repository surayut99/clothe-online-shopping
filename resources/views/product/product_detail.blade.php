@extends('layouts.main')

@section('content')
    <div class="bg-lr" style="padding: 90px;">
        <div class="container">
            <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
                <div class="bg-light mr-md-3 pt-3 px-3 py-md-3 px-md-3">
                        <img src="{{ asset('storage/pictures/korea_shoe.jpg')}}" style="height: 300px">
                </div>

                <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
                        <h2 class="display-5">ชื่อสินค้า</h2>
                        <h1 class="display-5">ราคา</h1>
                        <p class="lead">รองเท้านำเข้าจากเกาหลีคุณภาพดี ราคาถูก ใช้ทน ยางคุณภาพดี มีหลายไซซ์หลากสี</p>
                        <a class="btn btn-success">หยิบใส่รถเข็น</a>

                </div>
            </div>
        </div>

        <div class="container mb-3">
            <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
                <div class="media">
                    <img src="{{asset('storage/pictures/store.png')}}" class="mr-3" width="100px">
                    <h5>Store Name</h5>
                </div>
            </div>
        </div>

        <div class="container mb-3">
            <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
                <h5>รายละเอียดสินค้า</h5>
            </div>
        </div>

        <div class="container mb-3">
            <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
                <h5>คะแนนของสินค้า</h5>
            </div>
        </div>

    </div>

@endsection
