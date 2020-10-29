@extends('layouts.main')

@section('content')
    <div class="bg-lr" style="padding-top: 120px">
        <div class="container p-4" style="font-family: 'Bai Jamjuree', sans-serif; width: 50vw; background-color: rgba(0,0,0,.5); color: white; border-radius: 30px">
            <h1 style="text-align: center; padding-top: 30px">ลงทะเบียน</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <div class="form-inline">
                        <label for="exampleInputUserName">ชื่อผู้ใช้ &nbsp;</label>
                        <small id="email" class="form-text text-warning">***</small>
                    </div>
                    <input required type="text" class="form-control" name="name" aria-describedby="emailHelp">
                </div>

                <div class="form-group" >
                    <div class="form-inline">
                        <label for="exampleInputEmail1">อีเมล &nbsp;</label>
                        <small id="email" class="form-text text-warning">***</small>
                    </div>
                    <input required type="email" class="form-control" name="email" aria-describedby="emailHelp">
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="exampleInputPassword1">รหัสผ่าน &nbsp;</label>
                        <small id="email" class="form-text text-warning">***</small>
                    </div>
                    <input required type="password" class="form-control" name="password">
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="exampleInputPassword1">ยืนยันรหัสผ่าน &nbsp;</label>
                        <small id="email" class="form-text text-warning">***</small>
                    </div>
                    <input required type="password" class="form-control" name="password_confirmation">
                </div>

                {{-- <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="exampleInputTel">เบอร์โทรศัพท์ &nbsp;</label>
                        <small id="email" class="form-text text-warning">***</small>
                    </div>
                    <input required type="text" class="form-control" name="tel">
                </div> --}}

                <div style="text-align: center">
                    <button type="submit" class="btn" style="background-color: cornflowerblue;">ลงทะเบียน</button>
                </div>

            </form>
        </div>
    </div>
@endsection
