@extends('layouts.main')

@section('content')
    <div class='container'>

        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="d-inline  ml-3">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-11">
                                <input required class="form-control" type="text" placeholder="พิมพ์ชื่อสินค้าที่ต้องการค้นหา..." name="product_name" aria-label="Search">

                            </div>
                            <div class="col-1">
                                <div class="" style="text-align: right">
                                    <button type="submit" class="btn btn-outline-dark">ค้นหา</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <div class="col"></div>
        </div>

        <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight" style="margin-top: 15px">
            @foreach($products as $product)
                <div style="background-color: #FDEDEC; width:20vw; border-radius:10px; margin: 15px" class="p-3 text-center">
                    <img src="{{asset($product->product_img_path)}}" height="200px">
                    <div style="padding-top: 20px;">
                        <h4 class="rounded" style="color:black;">{{$product->product_name}}</h4>
                    </div>
                    <hr>
                    <div style="color:black">
                        <h6 style="color:blue">ราคา {{$product->price}} บาท </h6>
                        <label>{{$product->product_description}}</label>
                    </div>
                    <div class="text-center">
                        <a href="" class="btn btn-outline-info">เลือกสินค้า</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
