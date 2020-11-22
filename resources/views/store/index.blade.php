@extends('layouts.main')



@section('content')
<<<<<<< HEAD
<<<<<<< HEAD
<div class="pt-5 container">
  <div>
    <div class="media">
      <img src="{{asset("storage/pictures/brand/" . $stores->store_id . ".jpg")}}" class="mr-3" width="150px">
      <div class="media-body mt-5">
        <h5 class="mt-0">{{ $stores->store_name }}</h5>
        <h6>{{ $stores->store_description }}</h6>
      </div>
=======
<div class="container">
=======
<div class="container mt-5 ">
>>>>>>> 455e7f5485fba5c139452aeac1c3a9e0d078d320
    <h1>ร้านค้าทั้งหมด</h1>
    <div class="d-flex overflow-h">
        @foreach($stores as $store)
        <div class="item card mr-3 my-1 p-2 bordered-rounded text-center" style="background-color: whitesmoke; width:350px;">
            <a href="{{ route('stores.show',['store'=>$store->store_id]) }}" class="mx-auto pt-2" style='color:red'>
                <img src="{{asset($store->store_img_path)}}" style="object-fit: cover;width:150px;height:150px">
                <div style="color: black; padding-top: 20px">
                    <h3 style="text-align: center">{{$store->store_name}}</h3>
                    <p>{{$store->store_description}}</p>
                    {{-- <hr> --}}
                </div>
            </a>
        </div>
        @endforeach
>>>>>>> 94829b730b23028367b2cdea12efa33034894838
    </div>
</div>

@endsection
