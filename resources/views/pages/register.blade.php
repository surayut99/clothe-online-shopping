@extends('layouts.main')

@section('content')
    <h1>This is Register</h1>
    <form>
        <div class="form-group" >
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
        </div>

        <div class="form-group">
            <label for="exampleInputUserName">User Name</label>
            <input type="text" class="form-control" id="exampleInputUserName" aria-describedby="emailHelp">
        </div>

        <div class="form-group" style="margin-top: 20px">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group" style="margin-top: 20px">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="form-group" style="margin-top: 20px">
            <label for="exampleInputTel">Tel</label>
            <input type="text" class="form-control" id="exampleInputTel">
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Submit</button>

    </form>
@endsection
