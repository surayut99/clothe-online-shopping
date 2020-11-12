@extends('layouts.main')
@section('content')
<div class="container pt-5">
    <div class="d-flex">
        <h2>รถเข็นของคุณ</h2> <a class="btn btn-success ml-3" style="height:100%" href="{{route('stores.index')}}">เลือกสินค้าต่อ</a>
    </div>
    <table style="text-align: center; " class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px;" scope="col"></th>
                <th style="width: 200px;" scope="col">สินค้า</th>
                <th style="width: 100px;" scope="col">ราคาต่อชิ้น</th>
                <th style="width: 100px;" scope="col">จำนวน</th>
                <th style="width: 100px;" scope="col">ราคารวม</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr>
                <td><input type="checkbox" class="check" id="checkAll"></td>
                <td>{{$cart->product_name}}</td>
                <td>{{$cart->price}}</td>
                <td>{{$cart->qty}}</td>
                <td>{{$cart->qty * $cart->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <table style="text-align: center;"class="table table-striped">
            <thead>
                <tr>
                <th style="width: 10px;" scope="col"><input type="checkbox" class="checkAll1"  ></th>
                <th style="width: 200px;" scope="col">ชื่อร้านนะจ้ะ</th>
                <th style="width: 100px;" scope="col"></th>
                <th style="width: 100px;" scope="col"></th>
                <th style="width: 100px;"scope="col"></th>
                <th style="width: 50px;"scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th style="width: 10px;" scope="row"><input type="checkbox" class="check1"></th>
                <td style="width: 200px;">Marasdsadasdsdsadsadsadsak</td>
                <td style="width: 100px;">Otto</td>
                <td style="width: 100px;">
                    <div class="input-group number-spinner">
                    <span class="input-group-btn">
                        <button style="font-size: 10px;" class="btn btn-default btn-outline-success" data-dir="dwn">-<span class="glyphicon glyphicon-minus"></span></button>
                    </span>
                    <input style="font-size: 20px; width:50%; height:30px" type="text" class="form-control text-center" value="1">
                    <span class="input-group-btn">
                        <button style="font-size: 10px;" class="btn btn-default btn-outline-success" data-dir="up">+<span class="glyphicon glyphicon-plus"></span></button>
                    </span>
                    </div>
                </td>
                <td style="width: 100px;">@mdo</td>
                <td style=" width: 50px;"><button  class="btn btn-danger tr-1 tl-1">ลบ</button></td>
                </tr>
                <tr>
                <th scope="row"><input type="checkbox" class="check1"></th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row"><input type="checkbox" class="check1"></th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
        </table> --}}
    <a class="btn btn-primary float-right" href="{{ route('checkout') }}">Check out</a>
</div>
@endsection

<!-- ไว้กำหนดค่า + - จำนวนสินค้า -->
{{-- <script>
    $(document).on('click', '.number-spinner button', function() {
        var btn = $(this)
            , oldValue = btn.closest('.number-spinner').find('input').val().trim()
            , newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    }); --}}
