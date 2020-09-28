@extends('layouts.main')

@section('content')
    <h1>พื้นที่สำหรับ Promotion</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-bottom: 200px">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <h2 style="margin-bottom: 200px">
        หมวดหมู่สินค้าที่ต้องการค้นหา
    </h2>

    <h2>
        ร้านค้า
    </h2>
    <div class="card" style="width: 70rem;">

        <div class="media-body">
            <h5 class="mt-0 pl-2">MheeRhuMheeHen shop</h5>
            <p class="pl-5">ร้านนี้มีทุกอย่าง!!!</p>
            <a href="#" class="btn btn-primary" style="margin-left: 20px">ดูรายละเอียดร้านค้า</a>
        </div>
        <div class="card" style="width: 10rem;margin:10px">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 15px">จักรยานเพื่อการศึกษา</h5>
                <p class="card-text">ราคา 1222 บาท</p>
                <a href="#" class="btn btn-primary">ดูรายละเอียดสินค้า</a>
            </div>
        </div>
    </div>
@endsection
