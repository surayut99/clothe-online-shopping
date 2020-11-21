@extends('layouts.main')
@section('content')
<h1 hidden id="max"></h1>
<div class="container mt-5">
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
                <th style="width: 100px;" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($carts as $cart)
            <tr>
                <td><input type="checkbox" class="check" id="check"></td>
                <td>{{$cart->product_name}}</td>
                <td>{{$cart->price}}</td>
                <td>
                    <div class="input-group number-spinner mt-2">

                        <span class="input-group-btn">
                            <button name="{{$cart->product_id}}" style="font-size: 10px;" class="btn btn-default btn-outline-success" onclick="onClickMinus(event)">-<span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input name='{{$cart->product_id}}' id='{{$cart->product_id}}' style="font-size: 20px; width:50%; height:30px" type="text" class="form-control text-center" value="{{$cart->qty}}">
                        <span class="input-group-btn">
                            <button name="{{$cart->product_id}}" style="font-size: 10px;" class="btn btn-default btn-outline-success" onclick="onClickPlus(event)">+<span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                    </div>
                </td>
                <td>{{$cart->qty * $cart->price}}</td>
                <form action="{{route("cart.destroy",['id'=>$cart->product_id])}}" method="POST">
                    @method('delete')
                    @csrf
                    <td> <button action="submit" class="btn btn-danger tr-1 tl-1" style="font-size: 12px; border-radius: 8px;">ลบ</button></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3>ราคารวม: </h3>
    <a class=" btn btn-primary float-right" href="{{ route('checkout') }}">Check out</a>
</div>
@endsection

<script>
    function getMaxQty(id) {
        $.ajax({
            url: "product_qty/" + id
            , method: 'get'
            , success: function(data) {
                return parseInt(data)
            }
        })
    }

    function onClickPlus(event) {

        var id = event.target.name
        var curr = parseInt($('input#' + id).val())
        $.ajax({
            url: "product_qty/" + id
            , method: 'get'
            , success: function(data) {
                $('#max').val(data)
            }
        }).then(function() {
            if (curr + 1 <= $('#max').val()) {
                $('input#' + id).val(curr + 1)
            } else $('input#' + id).val($('#max').val())
        })


    }

    function onClickMinus(event) {
        var id = event.target.name
        var curr = parseInt($('input#' + id).val())
        console.log(id)
        console.log(curr)
        if (curr - 1 >= 1) {
            $('input#' + id).val(curr - 1)
        } else $('input#' + id).val(1)
    }

</script>
