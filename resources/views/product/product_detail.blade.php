@extends('layouts.main')

@section('content')
    <div class="bg-lr" style="padding: 90px;">
        <div class="container">
            <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
                <div class="bg-light mr-md-3 pt-3 px-3 py-md-3 px-md-3">
                        <img src="{{ asset('storage/pictures/korea_shoe.jpg')}}" style="height: 300px">
                </div>

                <div class="bg-light mr-md-3 pt-3 px-3 py-md-5 px-md-5">
                        <h2 class="display-5">{{ $products->product_name}}</h2>
                        <h1 class="display-5">{{$products->price}}</h1>
                        <p class="lead">{{$products->product_description}}</p>
                        <form action="{{route('addcart', ['id'=>$products->product_id])}}" method="post">
                        @csrf
                            <button type="submit" class="btn btn-success">หยิบใส่รถเข็น</button>
                            <div class="input-group number-spinner mt-2">
                                {{-- <span class="input-group-btn">
                                    <button style="font-size: 10px;" class="btn btn-default btn-outline-success" data-dir="dwn">-<span class="glyphicon glyphicon-minus"></span></button>
                                </span> --}}
                                <input name='qty' id='qty' style="font-size: 20px; width:50%; height:30px" type="text" class="form-control text-center" value="1">
                                {{-- <span class="input-group-btn">
                                    <button style="font-size: 10px;" class="btn btn-default btn-outline-success" data-dir="up">+<span class="glyphicon glyphicon-plus"></span></button>
                                </span> --}}
                            </div>
                        </form>
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
