@extends('layouts.main')

@section('content')

    <div class="bg-lr" style="padding-top: 160px;">
        <div class="container p-4" style="font-family: 'Bai Jamjuree', sans-serif; width: 50vw; background-color: rgba(0,0,0,.5); color: white; border-radius: 30px">
            <h1 style="text-align: center; padding-top: 30px">เข้าสู่ระบบ</h1>
            <form>
                <div class="form-group" style="margin-top: 10px">
                    <label for="email">อีเมล</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="อีเมล">
                    <small id="email" class="form-text text-muted"></small>
                </div>
                <div class="form-group" style="margin-top: 20px">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="รหัสผ่าน">
                </div>
                <div>
                    <a href="{{route('pages.home')}}" class="btn btn-primary">เข้าสู่ระบบ</a>
                </div>
                <hr>
                <div style="text-align: right">
                    <a href="{{route('pages.register')}}" class="btn" style="background-color: darkseagreen">ลงทะเบียน</a>
                    <div style="margin-top: 10px">
                        <a href="">ลืมรหัสผ่าน</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
