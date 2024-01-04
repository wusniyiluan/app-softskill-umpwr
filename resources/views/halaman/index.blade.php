@extends('layout/layout')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mb-5">
                <div class="card-body">
    <h2 class="text-center fw-bold">LOGIN</h2>
    <form action="/halaman/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" value="{{Session::get('username')}}" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class= "mb-3 d-grid">
            <button type="submit" name="submit" class="btn btn-primary">LOG IN</button>
        </div>
        <div>
            <center><h5>OR</h5></center>
        </div>
        <div class="mb-3 d-grid row justify-content-center">
            <p type="submit"name="submit" class=" align-items-center" ><a href="/forgot">FORGOT PASSWORD?</p>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection