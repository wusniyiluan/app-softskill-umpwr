@extends('layout/layout')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mb-5">
                <div class="card-body">
    <p>Kami akan mengirimkan link ke email anda, gunakan link tersebut untuk mereset password</p>
    <h1>Forgot Password</h1>
    <form action="/halaman/create3" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{Session::get('email')}}" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button type="submit"name="submit"class="btn btn-primary">Submit</button>
        </div>
    </form> 
</div>
</div>
</div>
</div>
</div>
@endsection