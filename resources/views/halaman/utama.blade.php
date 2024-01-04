@extends('layout1/layout')

@section('konten')

<div class="row">
    <div class="col-lg-4 d-sm-flex">
        <!-- Logo SoftSkill -->
        <div class="logo-container">
            <img src="{{ asset('gambar')}}/logo_softskill.png" class="rounded" width="100%" height="80px">
        </div>
    

        <!-- Logo UMP -->
        <div class="logo-container">
            <img src="{{ asset('gambar')}}/logo-ump.png" class="rounded" width="100%" height="80px">
        </div>
    </div>
    </div>
</div>



  <header class="masthead">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-5 text-center text-lg-start">
                            <h1 class="fw-bold ml-2 text-uppercase">SoftSkill</h1>
                            <h2 class="fw-bold">Universitas</h2>
                            <h2 class="fw-bold">Muhammadiyah Purworejo</h2>
                            <p class="fst-italic" style="font-size: 20px">"See it,Believe It,Act On It"</p>
                            <div
         class="d-grid gap-3 d-sm-flex  justify-content-xxl-start mb-3">
         <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder"
         href="/halaman/index">LOGIN</a>
         <div class="nav-item dropdown">
            <a class="btn btn-light btn-lg px-5 py-3 fs-6 fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              REGISTRASI
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/register">Peserta</a></li>
              <li><a class="dropdown-item" href="/fasilitatorr">Fasilitator</a></li>
              <li><a class="dropdown-item" href="/superadmin">SuperAdmin</a></li>
            </ul>
          </div>
        </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            <img src="{{ asset('gambar')}}/hero-img.png" class="rounded float-start" width="150%" height="400px">
                        </div>
                    </div>
                </div>
            </div>
  </header>

@endsection