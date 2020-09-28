<nav class="navbar navbar-expand-lg navbar-light nav-deco">
    <a id="home" class="navbar-brand" href="#">SHOPPOO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <div class="d-flex">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item {{\Route::currentRouteName()==='pages.home' ? 'active' : '' }}">
                        <a id="home" class="nav-link" href="{{ route('pages.home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            <div class="d-flex justify-content-center">
                    <ul class="navbar-nav">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                           style="width: 30vw;">
                    <button class="btn btn-warning my-2 my-sm-0" type="submit"
                            style="border:2px solid white">Search</button>
                </form>
                    </ul>
            </div>
            <div class="d-flex justify-content-center" id="account-content">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item  {{\Route::currentRouteName()==='pages.register' ? 'active' : '' }}" >
                        <a class="nav-link" href="{{ route('pages.register') }}">Register</a>
                    </li>
                    <li class="nav-item {{\Route::currentRouteName()==='pages.login' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pages.login') }}">Login</a>
                    </li>
                </ul>
            </div>
    </div>

</nav>
