@extends ('layouts.main')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div>
            <div class="media">
                <img src="storage/pictures/store.png" class="mr-3" width="150px">
                <div class="media-body mt-5">
                    <h5 class="mt-0">{{$stores[0]->store_name}}</h5>
                    <h6>{{ $stores[0]->store_description }}</h6>
                </div>
            </div>
        </div>

            <div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-warning">แก้ไขข้อมูลร้านค้า</button>
                </div>
                <hr>

                <a class="btn mb-3" style="background-color: #718096; color: white" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    การจัดการสินค้า
                </a>
            </div>
            <div>
                <div class="collapse mt-2 mb-3" id="collapseExample" >
                    <div>
                        <button class="btn btn-primary mr-2" data-toggle="collapse" href="#addCollapse">เพิ่มรายการสินค้า</button>
                        <button class="btn btn-warning mr-2" data-toggle="collapse" href="#editCollapse">แก้ไขข้อมูลสินค้า</button>
                        <button class="btn btn-danger mr-2" data-toggle="collapse" href="#deleteCollapse">ลบรายการสินค้า</button>
                    </div>
                    <div class="collapse mt-3" id="addCollapse">
                        <h6>เพิ่มรายการสินค้า</h6>
                        <div class="card card-body">
                            <form method='POST' action=" {{ route('product_list.store')}}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-inline">
                                        <label for="name">ชื่อสินค้า &nbsp;</label>
                                        <small class="form-text text-warning">***</small>
                                    </div>
                                    <input id="productName" type="text" class="form-control" name="productName">
                                </div>

                                <div class="form-group" >
                                    <div class="form-inline">
                                        <label for="email">คำอธิบายสินค้า &nbsp;</label>
                                        <small class="form-text text-warning">***</small>
                                    </div>
                                    <input  type="productDes" class="form-control" name="productDes">
                                </div>

                                <div style="text-align: center">
                                    <button type="submit" class="btn" style="background-color: brown;color: white;">เพิ่มสินค้าเลย</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="collapse mt-3" id="editCollapse">
                        <h6>แก้ไขรายการสินค้า</h6>
                    </div>
                    <div class="collapse mt-3" id="deleteCollapse">
                        <h6>ลบรายการสินค้า</h6>
                        <div class="card card-body">
                            <table class="table table-bordered table-stripped">
                                <thead class="table-info" style="text-align: center">
                                <tr>
                                    <th>ชื่อรายการสินค้า</th>
                                    <th>คำอธิบายรายการสินค้า</th>
                                    <th>สี</th>
                                    <th>ไซซ์</th>
                                    <th>จำนวนสินค้า</th>
                                    <th>ลบรายการ</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                    @foreach()--}}
{{--                                            <td></td>--}}
{{--                                    @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <h4>รายการสินค้าทั้งหมด</h4>
            <div id="between-content" class="d-flex d-inline-flex p-1 bd-highlight">
                @foreach($products as $product)
                    <div style="background-color: white;" class="p-3" >
                        <img src="{{asset($product->product_img_path)}}" width="150px">
                        <div style="color: black; padding-top: 20px">
                            <p style="text-align: center">{{$product->product_description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

    </div>
@endsection
<script>
    import Input from "../../js/Jetstream/Input";
    export default {
        components: {Input}
    }
</script>
