<div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </li>
    </ul>
</div>
<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/halaman/index"
                onclick="event.preventDefault();
                                Swal.fire({
                                    title: 'Konfirmasi Keluar',
                                    text: 'Apakah Anda yakin ingin keluar?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, Keluar!'
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                      document.getElementById('logout-form').submit();
                                    }
                                  });">
                <i class="fas fa-sign-out-alt" href="#"> </i> {{ __('Keluar') }}
            </a>
            <form id="logout-form" action="#" method="POST" class="d-none">
                @csrf
            </form>
            </a>
        </div>
    </li>
</ul>
