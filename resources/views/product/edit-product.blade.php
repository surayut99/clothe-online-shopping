@extends ('layouts.main')

@section('content')
    <div class="container" style="margin-top: 100px; font-family: 'Bai Jamjuree', sans-serif;">
        <div>
            <form action="{{ route('product_list.update',['product_list' => $products->product_id])}}" METHOD="POST">
                @method('PUT')
                @csrf
{{--                <label style="font-weight: bold;" for="myfile">รูปสินค้า:</label>--}}
{{--                <input value="{{old('myfile', $products[0]->product_img_path)}}" type="file" id="myfile" name="myfile"><br><br>--}}
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail4">ชื่อสินค้า:</label>
                        <input value="{{old('productName', $products->product_name)}}" class="form-control" id="productName" name="productName" placeholder="ชื่อสินค้า">
                    </div>
                    <br>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">จำนวนสินค้า:</label>
                        <input value="{{old('qty', $products->qty)}}"  class="form-control" id="qty" name="qty" placeholder="จำนวนสินค้า">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">ราคาสินค้า(บาท/ชิ้น):</label>
                        <input value="{{old('price', $products->price)}}" class="form-control" id="price" name="price" placeholder="ราคาสินค้า">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">ไซซ์:</label>
                        <input value="{{old('size', $products->size)}}"  class="form-control" id="size" name="size" placeholder="ไซซ์">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputPassword4">สี:</label>
                        <input value="{{old('color', $products->color)}}"  class="form-control" id="color" name="color" placeholder="สี">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputCity">หมวดหมวดหมู่สินค้า</label>
                        <select id="primeProdType" name="primeProdType" class="form-control"><option id="select" name="select" >
                            @foreach($product_type as $type){
                                @if($type->product_primary_type != $products->product_primary_type)
                                <option value="{{$type->product_primary_type}}">{{ $type->product_primary_type }}</option>
                                @else
                                <option selected value="{{$type->product_primary_type}}">{{ $type->product_primary_type }}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputState">หมวดหมู่สินค้าย่อย</label>
                        <select id="secondProdType" name="secondProdType" class="form-control"><option id="select" name="select" >
                                @foreach($secondary_types as $type){
                            @if($type->product_secondary_type != $products->product_secondary_type)
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
                    <input value="{{old('productDes', $products->product_description)}}" class="form-control" id="productDes" name="productDes">
                </div>
                <button type="submit" class="btn btn-primary" >ยืนยันการแก้ไข</button>
            </form>
        </div>
    </div>
@endsection
