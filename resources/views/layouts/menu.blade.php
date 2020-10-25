<div style="font-family: 'Bai Jamjuree', sans-serif;">
    <nav class="navbar navbar-expand-lg navbar-light nav-deco lock-navbar d-flex justify-content-between">

        {{-- Home LOGO --}}
        <a id="home" class="navbar-brand" href="/" >SHOPPOO</a>

        {{-- Search Tool --}}
        <div class="d-flex">
            <ul class="navbar-nav">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="ค้นหา" aria-label="Search"
                        style="width: 30vw;">
                    <button class="btn btn-warning my-2 my-sm-0" type="submit"
                        style="border:2px solid white">ค้นหา</button>
                </form>
            </ul>
        </div>

        {{-- Acccount Tool --}}
        <div class="d-flex" id="account-content">
            @if (Route::has('login'))
                <ul class="navbar-nav mr-auto ">
                    @auth
                        <li>
                            <a class="nav-link" href="{{ url('/profile') }}">{{ Auth::user()->name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">ลงทะเบียน</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                            </li>
                        @endif
                    @endif
                </ul>
            @endif
        </div>
    </nav>
</div>
