<div style="font-family: 'Bai Jamjuree', sans-serif;">
    <nav class="navbar navbar-expand-lg navbar-light nav-deco lock-navbar d-flex justify-content-between">

        {{-- Home LOGO --}}
        <div class="d-flex">
        <img src="{{asset('storage/pictures/logo.png')}}" style="height: 50px; filter: drop-shadow(2px 2px 2px black);">
        <div class= "pt-2 pl-2" style="line-height: 3px">
        <a id="home" class="navbar-brand logo-font" href="/" style="font-size:30px">
          SHOPPOOL</a>
         <br>
         <a id="home" class="navbar-brand logo-font1" href="/" style="font-size:15px" >
         fabulous & gorgeous</a>
         </div>
         </div>
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
                    <li><a href="{{ route('cart') }}"><img src="{{asset('storage/pictures/cart.png')}}" style="height: 40px;" ></a></li>
                        <li>
                            <a class="nav-link" href="{{ url('/profile') }}">{{ Auth::user()->name }}</a>
                        </li>
                    @else
                        <li class="nav-item {{ \Route::currentRouteName() === 'register' ? 'active' : '' }}" >
                            <a class="nav-link" href="{{ route('register') }}">ลงทะเบียน</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item {{ \Route::currentRouteName() === 'login' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                            </li>
                        @endif
                    @endif
                </ul>
            @endif
        </div>
    </nav>
</div>
