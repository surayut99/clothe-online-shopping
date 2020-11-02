@extends('layouts.main')
@section('content')
    <div class="container" style="padding-top: 90px;">
        <h1>รถเข็นของคุณ</h1>
        <table style="text-align: center;" class="table table-striped">
            <thead>
                <tr >
                <th style="width: 10px;" scope="col"><input type="checkbox" class="check" id="checkAll"></th>
                <th style="width: 200px;" scope="col">สินค้า</th>
                <th style="width: 100px;" scope="col">ราคาต่อชิ้น</th>
                <th style="width: 100px;" scope="col">จำนวน</th>
                <th style="width: 100px;" scope="col">ราคารวม</th>
                <th style="width: 50px;" scope="col">หมายเหตุ</th>
                </tr>
            </thead>
        </table>
        <div><h5 style="padding-left:20px">ชื่อร้านนะจ้ะ</h5></div>
        <table style="text-align: center;"class="table table-striped">
            <thead>
                <tr>
                <th style="width: 10px;" scope="col"><input type="checkbox" class="checkAll1"  ></th>
                <th style="width: 200px;" scope="col">สินค้า</th>
                <th style="width: 100px;" scope="col">ราคาต่อชิ้น</th>
                <th style="width: 100px;" scope="col">จำนวน</th>
                <th style="width: 100px;"scope="col">ราคารวม</th>
                <th style="width: 50px;"scope="col">หมายเหตุ</th>
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
                <td style=" width: 50px;"><button style="font-size: 10px;" class="btn btn-danger">ลบ</button></td>
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
        </table>
    </div>
@endsection