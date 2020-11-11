@extends('layouts.main')

@section('content')
    <div class="container" style="margin-top: 100px;font-family: 'Bai Jamjuree'">
        <h2>ข้อมูลเบื้องต้นร้านค้าของแม่ค้ามือใหม่</h2>

{{--        <form action="{{route('posts.update', ['post' => $post->id])}}" method="POST">--}}
        <form action="{{ route('stores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-inline">
                    <label for="name">ชื่อร้านค้า &nbsp</label>
                    <small class="form-text text-warning">***</small>
                </div>
                <input required id="storeName" type="text" class="form-control" name="storeName">
{{--                <input id="storeName" type="text" class="form-control" name="storeName">--}}
            </div>

            <div class="form-group">
                <div class="form-inline">
                    <label for="name">คำอธิบายร้านค้า &nbsp</label>
                    <small class="form-text text-warning">***</small>
                </div>
                <input required id="storeDes" type="text" class="form-control" name="storeDes">
{{--                <input id="storeDes" type="text" class="form-control" name="storeDes">--}}
            </div>

            <div class="form-group">
                <div class="form-inline">
                    <label for="name">เลขบัญชีธนาคาร &nbsp</label>
                    {{-- <small class="form-text text-warning">***</small> --}}
                </div>
{{--                <input required id="bankId" type="text" class="form-control" name="bankId">--}}
                <input id="bankId" type="text" class="form-control" name="bankId">
            </div>

            <div class="form-group">
                <div class="form-inline">
                    <label for="name">เบอร์โทรศัพท์ &nbsp</label>
                    {{-- <small class="form-text text-warning">***</small> --}}
                </div>
{{--                <input required id="tel" type="text" class="form-control" name="tel">--}}
                <input id="storeTel" type="text" class="form-control" name="storeTel">
            </div>

            <div style="text-align: center">
                <button type="submit" class="btn" style="background-color: greenyellow; color:black">สร้างร้านค้า</button>
            </div>
        </form>
    </div>
@endsection
