@extends('layout/layout')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mb-5">
                <div class="card-body">
    <h2 class="text-center fw-bold mb-4">REGISTER FASILITATOR</h2>
    <form action="/halaman/create1" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="username" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="user_role" class="form-label">UserRole</label>
            <input type="user_role" name="user_role" value="2" readonly="readonly" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
        </div> 
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection