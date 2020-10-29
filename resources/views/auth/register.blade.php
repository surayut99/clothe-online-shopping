<x-guest-layout>
@include('layouts.menu')
    <div class="bg-lr" style="padding-top: 120px">
        <div class="container p-4" style="font-family: 'Bai Jamjuree', sans-serif; width: 50vw; background-color: rgba(0,0,0,.5); color: white; border-radius: 30px">
            <h1 style="text-align: center; padding-top: 30px">ลงทะเบียน</h1>

            <x-jet-validation-errors class="mb-4" />

            <form>
                @csrf

                <div class="form-group">
                    <div class="form-inline">
                        <label for="name">ชื่อผู้ใช้ &nbsp;</label>
                        <small class="form-text text-warning">***</small>
                    </div>
                    <input required id="name" type="text" class="form-control" name="name">
                </div>

                <div class="form-group" >
                    <div class="form-inline">
                        <label for="email">อีเมล &nbsp;</label>
                        <small class="form-text text-warning">***</small>
                    </div>
                    <input required type="email" class="form-control" name="email">
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="password">รหัสผ่าน &nbsp;</label>
                        <small class="form-text text-warning">***</small>
                    </div>
                    <input required id="password" type="password" class="form-control" name="password">
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="pasword_confirmation">ยืนยันรหัสผ่าน &nbsp;</label>
                        <small class="form-text text-warning">***</small>
                    </div>
                    <input required id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group" style="margin-top: 20px">
                    <div class="form-inline">
                        <label for="telephone">เบอร์โทรศัพท์ &nbsp;</label>
                        <small class="form-text text-warning">***</small>
                    </div>
                    <input required id="telephone" type="text" class="form-control" name="telephone">
                </div>

                <div style="text-align: center">
                    <button type="submit" class="btn" style="background-color: cornflowerblue;">ลงทะเบียน</button>
                </div>

            </form>

            {{-- <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('ชื่อ') }}" class="text-white"/>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('อีเมล์') }}" class="text-white" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('รหัสผ่าน') }}" class="text-white" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('ยินยันรหัสผ่าน') }}" class="text-white" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="telephone" value="{{ __('เบอร์โทรศัพท์') }}" class="text-white" />
                    <x-jet-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autocomplete="telephone" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form> --}}
        </div>
    </div>
</x-guest-layout>


{{-- <div class="bg-lr" style="padding-top: 120px">
    <div class="container p-4" style="font-family: 'Bai Jamjuree', sans-serif; width: 50vw; background-color: rgba(0,0,0,.5); color: white; border-radius: 30px">
        <h1 style="text-align: center; padding-top: 30px">ลงทะเบียน</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <div class="form-inline">
                    <label for="name">ชื่อผู้ใช้ &nbsp;</label>
                    <small id="name" class="form-text text-warning">***</small>
                </div>
                <input required type="text" class="form-control" name="name">
            </div>

            <div class="form-group" >
                <div class="form-inline">
                    <label for="exampleInputEmail1">อีเมลล์ &nbsp;</label>
                    <small id="email" class="form-text text-warning">***</small>
                </div>
                <input required type="email" class="form-control" name="email">
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

            <div class="form-group" style="margin-top: 20px">
                <div class="form-inline">
                    <label for="exampleInputTel">เบอร์โทรศัพท์ &nbsp;</label>
                    <small id="email" class="form-text text-warning">***</small>
                </div>
                <input required type="text" class="form-control" name="tel">
            </div>

            <div style="text-align: center">
                <button type="submit" class="btn" style="background-color: cornflowerblue;">ลงทะเบียน</button>
            </div>

        </form>
    </div>
</div> --}}
