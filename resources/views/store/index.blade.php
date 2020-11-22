@extends('layouts.main')



@section('content')
<div class="container">
    <h1>ร้านค้าทั้งหมด</h1>
    <div class="d-flex overflow-h">
        @foreach($stores as $store)
        <div class="item card mr-3 my-1 p-2 bordered-rounded text-center" style="background-color: whitesmoke; width:500px;">
            <a href="{{ route('stores.show',['store'=>$store->store_id]) }}" class="mx-auto pt-2" style='color:red'>
                <img src="{{asset($store->store_img_path)}}" width="150px">
                <div style="color: black; padding-top: 20px">
                    <h3 style="text-align: center">{{$store->store_name}}</h3>
                    <p>{{$store->store_description}}</p>
                    {{-- <hr> --}}
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
{{-- @section('content')
<div class="container mt-5">
    <div>
        <div class="media">
            <img src="{{asset("storage/pictures/icon/default_store.png")}}" class="mr-3" width="150px">
<div class="media-body mt-5">
    <h5 class="mt-0">{{ $stores->store_name }}</h5>
    <h6>{{ $stores->store_description }}</h6>
</div>
</div>
</div>
<div class="d-flex justify-content-end">
    <a href="{{route('products.create')}}" class="btn btn-primary mr-2" id="addProduct">เพิ่มรายการสินค้า</a>
    <a href="{{route('products.create')}}" class="btn btn-primary mr-2" id="addProduct">การจัดการสินค้า</a>
</div>


<div class="d-flex overflow-h">
    @foreach($products as $product)
    <div class="item card mr-3 my-1 p-2 bordered-rounded" style="background-color: whitesmoke">
        <a href="{{ route('products.show',['product'=>$product->product_id]) }}" class="mx-auto pt-2">
            <img src="{{asset($product->product_img_path)}}" width="150px">
            <div style="color: black; padding-top: 20px">
                <h3 style="text-align: center">{{$product->product_name}}</h3>
                <p style="text-align: center">{{$product->product_description}}</p>
            </div>
        </a>
    </div>
    {{-- <div style="background-color: orange; width:500px; height:500px" class="mx-2 item">
    </div> --}}
    @endforeach
</div> --}}

{{-- <div class="collapse" id="delete">
        <hr>
        <h6>ลบรายการสินค้า</h6>
        <form action="">

            <table class="table table-bordered table-stripped" style="text-align: center">
                <thead class="table-danger" style="text-align: center">
                    <th>ชื่อสินค้า</th>
                    <th>คำอธิบายสินค้า</th>
                    <th>จำนวนสินค้า</th>
                    <th>สี</th>
                    <th>ไซซ์</th>
                    <th>ราคา</th>
                    <th>ลบสินค้า</th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <form action="{{route('products.destroy', ['products'=> $product->product_id])}}" method="POSt">
@method('delete')
@csrf
<tr style="text-align: center">
    <td>{{ $product->product_name }}</td>
    <td>{{ $product->product_description }}</td>
    <td>{{ $product->qty }}</td>
    <td>{{ $product->color }}</td>
    <td>{{ $product->size }}</td>
    <td>{{ $product->price }}</td>
    <td>
        <button type="submit" class="btn btn-danger pl-2 pr-2 pt-1 pb-1">
            ลบ
        </button>
    </td>
</tr>
</form>
@endforeach
</tbody>
</table>
</form>

</div>

<div class="collapse" id="edit">
    <hr>
    <h6>แก้ไขสินค้า</h6>
    <table class="table table-bordered table-stripped" style="text-align: center">
        <thead class="table-warning" style="text-align: center">
            <th>ชื่อสินค้า</th>
            <th>คำอธิบายสินค้า</th>
            <th>จำนวนสินค้า</th>
            <th>สี</th>
            <th>ไซซ์</th>
            <th>ราคา</th>
            <th>แก้ไขสินค้า</th>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr style="text-align: center">
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_description }}</td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{route('products.edit', ['products'=> $product->product_id])}}" class="btn btn-warning pl-2 pr-2 pt-1 pb-1">
                        แก้ไข
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr>

<div>
    <h4>รายการสินค้าทั้งหมด</h4>
    <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight">
        @foreach($products as $product)
        <div style="background-color: white;" class="p-3">
            <img src="{{asset($product->product_img_path)}}" width="150px">
            <div style="color: black; padding-top: 20px">
                <p style="text-align: center">{{$product->product_name}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}

<hr>
</div>

@endsection
