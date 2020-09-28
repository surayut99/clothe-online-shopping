@extends('layouts.main')

@section('content')


    <form>
        <div class="form-group" style="margin-top: 10%">
            <label for="exampleInputEmail1">User Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share user name with anyone else.</small>
        </div>
        <div class="form-group" style="margin-top: 20px">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div >
            <a style="margin-top: 10px">Not have any account? <a class="nav-link-inline" href="{{ route('pages.register') }}"> Register Here!</a></a>
            <br>
            <a>Forgot Password? <a class="nav-link-inline" href="{{ route('pages.register') }}"> Click Here! </a> << Not ready yet!</a>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Submit</button>

    </form>
@endsection
