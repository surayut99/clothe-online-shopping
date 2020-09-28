@extends('layouts.main')

@section('content')
    <div class="bg-lr" style="padding-top: 120px">
        <div class="container p-4" style="font-family: 'Bai Jamjuree', sans-serif; width: 50vw; background-color: rgba(0,0,0,.5); color: white; border-radius: 30px">
            <h1 style="text-align: center; padding-top: 30px">ลงทะเบียน</h1>
            <form>
                <div class="form-group" >
                    <div class="form-inline">
                        <label for="exampleInputEmail1">อีเมลล์ &nbsp;</label>
                        <small id="email" class="form-text text-muted">***</small>
                    </div>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="exampleInputUserName">ชื่อผู้ใช้ &nbsp;</label>
                        <small id="email" class="form-text text-muted">***</small>
                    </div>
                    <input type="text" class="form-control" id="exampleInputUserName" aria-describedby="emailHelp">
                </div>
                <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="exampleInputPassword1">รหัสผ่าน &nbsp;</label>
                        <small id="email" class="form-text text-muted">***</small>
                    </div>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="exampleInputPassword1">ยืนยันรหัสผ่าน &nbsp;</label>
                        <small id="email" class="form-text text-muted">***</small>
                    </div>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group" style="margin-top: 20px">
                    <div>
                        <label for="exampleInputTel">เบอร์โทรศัพท์</label>
                    </div>
                    <input type="text" class="form-control" id="exampleInputTel">
                </div>
                <div style="text-align: center">
                    <a href="{{route('pages.login')}}" class="btn" style="background-color: cornflowerblue;">ลงทะเบียน</a>
                </div>
            </form>
        </div>
    </div>
@endsection
