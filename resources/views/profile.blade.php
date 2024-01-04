<!-- resources/views/profile.blade.php -->

@extends('layout1.app')

@section('title', 'Profile Pengguna')

@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card mb-5">
                    <div class="card-body">
                        <h2 class="text-center fw-bold mb-4">Profil Pengguna</h2>
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" value="{{ $user->username }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="user_role" class="form-label">User Role</label>
                            <input type="text" class="form-control" value="{{ $user->user_role }}" readonly>
                        </div>

                        <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
