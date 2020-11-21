@extends('layouts.main')



@section('content')
<div class="container">
    <h1>ร้านค้าทั้งหมด</h1>
    <div class="d-flex overflow-h">
        @foreach($stores as $store)
        <div class="item card mr-3 my-1 p-2 bordered-rounded" style="background-color: whitesmoke">
            <a href="{{ route('stores.show',['store'=>$store->store_id]) }}" class="mx-auto pt-2" style='color:red'>
                {{-- <img src="{{asset($store->product_img_path)}}" width="150px"> --}}
                <div style="color: black; padding-top: 20px">
                    <h3 style="text-align: center">{{$store->store_name}}</h3>
                    <hr>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
