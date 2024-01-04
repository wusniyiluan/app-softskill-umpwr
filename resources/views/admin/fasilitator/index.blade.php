@extends('layoutadmin.app')

@section('title','Admin Fasilitator')
@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
        <form action="/admin/fasilitator" method="GET" class="mb-2" id="filterForm">
            <div class="input-group">
                <label for="prodi" class="me-2 mr-2">Program Studi : </label>
                <select name="prodi" id="prodi" class="custom-select" onchange="submitForm()">
                    <option value="">Semua Program Studi</option>
                    <!-- Looping untuk menampilkan pilihan program studi -->
                    @foreach($programStudis as $program)
                        <option value="{{ $program->Prodi }}" {{ $selectedProdi == $program->Prodi ? 'selected' : '' }}>
                            {{ $program->Prodi }}
                        </option> 
                    @endforeach
                </select> 
                <button type="submit" class="btn btn-secondary ms-2 ml-1" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" >Filter</button>
            </div>
        </form>

                <div class="card shadow mb-4 " style="max-width: 1050px; margin: auto;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Fasilitator</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="card-header d-flex justify-content-between" style="background-color: #ffffff;">
                                <div class="col-auto">
                                    <form action="/admin/fasilitator" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group" style="border-top-right-radius: 25px; border-bottom-right-radius: 25px;">
                                            <input type="search" name="search" id="inputSearch" class="form-control bg-light" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="border-top-left-radius: 6px; border-bottom-left-radius: 6px; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" onclick="submitForm()" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>  
                                </div>
                                <div>
                                    <a href="/admin/fasilitator/create" class="btn btn-primary mb-3">Create New</a>
                                </div>
                            </div>
                            <!-- Script untuk mengirimkan formulir pencarian -->
                                <script>
                                    function submitForm() {
                                        document.getElementById("searchForm").submit();
                                    }
                                </script>
                        </div>
                
            <!-- Tampilkan data atau pesan kesalahan -->
           @if(isset($data) && !$data->isEmpty())

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 15px">
            <thead class="table-dark" style="text-align: center;">
                <tr>
                    <th>NO</th>
                    <th>NIDN</th>
                    <th>NAMA LENGKAP</th>
                    <th col-8>PRODI</th>
                    <th>AKSI</th>
                </tr>
            </thead>
           
            <tbody>
                <?php $no = $data->firstItem() ?>
                @forelse ($data as $fasilitator)
                    <tr>
                        <th scope="row" style="text-align: center;">{{ $no }}</th>
                        <td>{{ $fasilitator->NIDN }}</td>
                        <td>{{ $fasilitator->Nama_Lengkap }}</td>
                        <td>{{ $fasilitator->Prodi }}</td>
                        <td>
                            
                            <a href="/admin/fasilitator/show/{{ ($fasilitator->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-database"></i> View
                            </a>
                            <a href="/admin/fasilitator/edit/{{ ($fasilitator->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Update
                            </a>
                            <form action="/admin/fasilitator/delete/{{  $fasilitator->id }}" method="POST" class="d-inline">
                                @csrf
                                <!-- Metode HTTP yang digunakan untuk menghapus data -->
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-flat confirm-delete" data-toggle="tooltip" title='Delete'>
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++ ?>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data fasilitator.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $data->links() }}
        @else
            <div class="alert alert-info" role="alert">
                Data tidak ditemukan.
            </div>
        @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
