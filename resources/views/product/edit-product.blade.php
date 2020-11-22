@extends('layouts.main')
@section('content')
<div style="padding: 90px;">
    <div class="container" style="margin-top: 100px; font-family: 'Bai Jamjuree', sans-serif; ">
        <div>
            <form action="{{route('products.update',['product'=>$product->product_id])}}" METHOD="POST">
                @method('PUT')
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail4">ชื่อสินค้า:</label>
                        <input value="{{old('productName', $product->product_name)}}" class="form-control" id="productName" name="productName" placeholder="ชื่อสินค้า">
                    </div>
                    <br>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">จำนวนสินค้า:</label>
                        <input value="{{old('qty', $product->qty)}}" class="form-control" id="qty" name="qty" placeholder="จำนวนสินค้า">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">ราคาสินค้า(บาท/ชิ้น):</label>
                        <input value="{{old('price', $product->price)}}" class="form-control" id="price" name="price" placeholder="ราคาสินค้า">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">ไซซ์:</label>
                        <input value="{{old('size', $product->size)}}" class="form-control" id="size" name="size" placeholder="ไซซ์">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputPassword4">สี:</label>
                        <input value="{{old('color', $product->color)}}" class="form-control" id="color" name="color" placeholder="สี">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputCity">หมวดหมวดหมู่สินค้า</label>
                        <select id="primeProdType" name="primeProdType" class="form-control">
                            <option id="select" name="select">
                                @foreach($product_type as $type){
                                @if($type->product_primary_type != $product->product_primary_type)
                            <option value="{{$type->product_primary_type}}">{{ $type->product_primary_type }}</option>
                            @else
                            <option selected value="{{$type->product_primary_type}}">{{ $type->product_primary_type }}</option>
                            @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputState">หมวดหมู่สินค้าย่อย</label>
                        <select id="secondProdType" name="secondProdType" class="form-control">
                            <option id="select" name="select">
                                @foreach($secondary_types as $type){
                                @if($type->product_secondary_type != $product->product_secondary_type)
                            <option value="{{$type->product_secondary_type}}">{{ $type->product_secondary_type }}</option>
                            @else
                            <option selected value="{{$type->product_secondary_type}}">{{ $type->product_secondary_type }}</option>
                            @endif
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputAddress">รายละเอียดสินค้า: </label>
                    <input value="{{old('productDes', $product->product_description)}}" class="form-control" id="productDes" name="productDes">
                </div>
                <button type="submit" class="btn btn-primary">ยืนยันการแก้ไข</button>
            </form>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection
