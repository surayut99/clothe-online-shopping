@extends ('layouts.main')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div>
            <div class="media">
                <img src="storage/pictures/store.png" class="mr-3" width="150px">
                <div class="media-body mt-5">
                    <h5 class="mt-0">{{ $stores->store_name }}</h5>
                    <h6>{{ $stores->store_description }}</h6>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mr-2"  class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">เพิ่มรายการสินค้า</button>
            <button class="btn btn-primary mr-2" data-toggle="collapse" data-target="#delete">ลบรายการสินค้า</button>
            <button data-toggle="collapse" data-target="#edit" class="btn btn-primary">แก้ไขสินค้า</button>
        </div>

        <div class="collapse" id="collapseExample">
            <hr>
            <h6>เพิ่มรายการสินค้า</h6>
            <form action="{{ route('product_list.store')}}" METHOD="POST">
                @csrf
{{--                <form action="/action_page.php">--}}
                    <label style="font-weight: bold;" for="myfile">รูปสินค้า:</label>
                    <input type="file" id="myfile" name="myfile"><br><br>
{{--                </form>--}}
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail4">ชื่อสินค้า:</label>
                        <input class="form-control" id="productName" name="productName" placeholder="ชื่อสินค้า" value="เสื้อ">
                    </div>
                    <br>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">จำนวนสินค้า:</label>
                        <input  class="form-control" id="qty" name="qty" placeholder="จำนวนสินค้า" value="10">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">ราคาสินค้า(บาท/ชิ้น):</label>
                        <input  class="form-control" id="price" name="price" placeholder="ราคาสินค้า" value="10">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">ไซซ์:</label>
                        <input  class="form-control" id="size" name="size" placeholder="ไซซ์" value="M">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">สี:</label>
                        <input  class="form-control" id="color" name="color" placeholder="สี" value="สีเหลือง">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputCity">หมวดหมวดหมู่สินค้า</label>
                        <select id="primeProdType" name="primeProdType" class="form-control">
                            @foreach($product_type as $type){
                                <option name="primeProdType" value="{{$type->product_primary_type}}">{{ $type->product_primary_type }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputState">หมวดหมู่สินค้าย่อย</label>
                        <select id="secondProdType" name="secondProdType" class="form-control">
                            @foreach($secondary_types as $secondary)
                                    <option selected>{{ $secondary->product_secondary_type }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">รายละเอียดสินค้า: </label>
                    <input class="form-control" id="productDes" name="productDes" value="เสื้อาสวย">
                </div>
                <button type="submit" class="btn btn-primary" >เพิ่มรายการสินค้าเลย</button>
            </form>
        </div>
        <div class="collapse" id="delete">
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
                            <tr style="text-align: center">
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_description }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->color }}</td>
                                <td>{{ $product->size }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <form action="{{route('product_list.destroy', ['product_list'=> $product->product_id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">ลบ</button>
                                    </form>

                                </td>
                            </tr>
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
                            <a href="{{route('product_list.edit', ['product_list'=> $product->product_id])}}" class="btn btn-warning pl-2 pr-2 pt-1 pb-1">
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
                    <div style="background-color: white;" class="p-3" >
                        <img src="{{asset('storage/pictures/'.$product->product_img_path)}}" width="150px">
                        <div style="color: black; padding-top: 20px">
                            <p style="text-align: center">{{$product->product_name}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

    </div>
@endsection

<script>
    import Button from "@/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>

