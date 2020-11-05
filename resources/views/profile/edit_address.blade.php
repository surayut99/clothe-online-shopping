@extends('layouts.main')

@section('content')
<div class="bg-orange" style="min-height: 100vh;font-family: 'Bai Jamjuree', sans-serif; padding-top:100px">
  <div class="container">
    <h1 style="border: 2px ">แก้ไขที่อยู่สำหรับจัดส่ง</h1>

    <div class="bd-highlight">

      <form action="{{ route('address.update', ['address' => $addr->no]) }}" style="width: 30vw" method="POST">
        @method('put')
        @csrf
        <div class="form-group">
          <label>ชื่อผู้รับ</label>
          <input class="form-control" @error('new_receiver') is-invalid @enderror type="text" name="new_receiver" id="new_receiver" value="{{ old('new_receiver', $addr->receiver) }}">

          @error('new_receiver')
          <div class="mt-2 alert alert-danger">{{ $message }}</div>
          @enderror

        </div>

        <div class="form-group">
          <label>เบอร์โทร</label>
          <input class="form-control" @error('new_tel') is-invalid @enderror type="text" name="new_tel" id="new_tel" onkeyup="validateTelNumber(this)" value="{{ old('new_tel', $addr->telephone) }}">

          @error('new_tel')
          <div class="mt-2 alert alert-danger">{{ $message }}</div>
          @enderror

        </div>

        <div class="form-group">
          <label>ที่อยู่</label>
          <textarea class="form-control" @error('new_address') is-invalid @enderror name="new_address" id="new_address">{{ old('new_address', $addr->address) }}</textarea>

          @error('new_address')
          <div class="mt-2 alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <br>
        <div class="d-flex justify-content-between">
          <button type=submit class="btn btn-primary">บันทึก</button>
        </div>

      </form>

      <hr>

      <form class="mt-3" onsubmit="return confirm('go ?')" action="{{ route('address.destroy', ['address' => $addr->no]) }}" method="POST">
        @method('delete')
        @csrf
        <button class="btn btn-danger">ลบที่อยู่นี้</button>
      </form>



    </div>
  </div>

  <script src="{{ asset('storage/js/editProfile.js') }}"></script>

</div>
@endsection
