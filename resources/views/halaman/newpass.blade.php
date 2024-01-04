@extends('layout/layout')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mb-5">
                <div class="card-body">
    <h1>Confirmasi Password Baru</h1> 
    <form action="/reset-password" method="POST">
        @csrf
        <input type="text" name="token" hidden value="{{$token}}">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button type="submit"name="submit"class="btn btn-outline-primary">Submit</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection