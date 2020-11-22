@extends('layouts.main')

@section('content')
<div class="bg-light">
    <div class=" container">
        <h1 style="border: 2px ">แก้ไขข้อมูลส่วนตัว</h1>

        <div class="bd-highlight">
            <div class="py-2 bd-highlight">
                <div class="my-1">
                    <img id="preImg" name="preImg" src="{{ asset('storage/pictures/avatars/'.Auth::user()->id.'.jpg') }}" width="150" height="150">
                </div>
            </div>

            <form enctype="multipart/form-data" style="width: 15vw" id="profile-form" action="{{ route('update-profile') }}" method=POST>
                @csrf

                <div class="my-1">
                    <label>เลือกรูปโปรไฟล์</label>
                    <br>
                    <input type="file" id="inpImg" name="inpImg" accept="image/png, image/jpeg" onchange="previewAvatar()">
                </div>

                <div class="my-1">
                    <h4>ชื่อ: </h4>
                    <input value="{{Auth::user()->name}}" name="new_name" class="form-control" id="changeName">
                </div>

                <div class="my-1">
                    <h4>เบอร์โทร: </h4>
                    <input value="{{Auth::user()->telephone}}" name="new_tel" class="form-control" id="changeTel" type='string' onkeyup="validateTelNumber(this)">
                </div>

                <button type="submit" class="btn btn-primary my-3" href="">บันทึก</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('storage/js/editProfile.js') }}"></script>
<script src="{{ asset('storage/js/previewInpImg.js') }}"></script>
@endsection
