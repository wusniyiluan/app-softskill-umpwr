@extends('layout1.app')
@section('title', 'Data Peserta')

@section('contents')
<div class="container">
  <div class="row justify-content-between mb-3 align-items-center">
    <div class="col-md-14">
      <form action="/peserta" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <label for="tahun" class="col-form-label">Pilih Tahun:</label>
            <select name="tahun" id="tahun" class="custom-select">
              <option value="">Semua Tahun</option>
              @for ($year = 2021; $year <= 2023; $year++)
                <option value="{{ $year }}" {{ $selectedTahun == $year ? 'selected' : '' }}>{{ $year }}</option>
              @endfor
            </select>
          </div>
          <!-- Level filter -->
          <div class="col-auto">
            <label for="level" class="col-form-label">Pilih Level:</label>
            <select name="level" id="level" class="custom-select">
              <option value="">Semua Level</option>
              @for ($level = 1; $level <= 3; $level++)
                <option value="{{ $level }}" {{ $selectedLevel == $level ? 'selected' : '' }}>Level {{ $level }}</option>
              @endfor
            </select>
          </div>

          <div class="col-auto">
            <button type="submit" class="btn btn-secondary mt-4">Filter</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="card shadow mb-4 " style="max-width: 1050px; margin: auto;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="card-header d-flex justify-content-between" style="background-color: #ffffff;">
                <div class="col-auto">
                  <form action="/peserta" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group" style="border-top-right-radius: 25px; border-bottom-right-radius: 25px;">
                        <input type="search" name="search" id="inputSearch" class="form-control bg-light" value="{{ $search }}" placeholder="Cari Nama Lengkap atau Prodi..." aria-label="Search" aria-describedby="basic-addon2" style="border-top-left-radius: 6px; border-bottom-left-radius: 6px; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>  
                </div>
                @if(auth()->user()->user_role == '3')
                  <div class="col-md-4">
                    <a href="/peserta/tambahpeserta" class="btn btn-primary mb-3">
                      <i class="fas fa-plus-circle"></i> Create New
                    </a>
                  </div>
                @endif
            </div> 
          </div>     
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
        <thead class="table-dark" style="text-align: center;">
          <tr>
            <th scope="col">NO</th>
            <th scope="col">NIM</th>
            <th scope="col">NAMA LENGKAP</th>
            <th scope="col">PRODI</th>
            <th scope="col">LEVEL</th>
            <th scope="col" >TAHUN</th>
            <th scope="col" style="width: 23%;">AKSI</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @forelse ($data as $peserta)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td>{{ $peserta->NIM }}</td>
              <td>{{ $peserta->nama_lengkap }}</td>
              <td>{{ $peserta->prodi }}</td>
              <td>{{ $peserta->level }}</td>
              <td>{{ $peserta->tahun }}</td>
              <td>
                <a href="/peserta/tampilkandata/{{ $peserta->id }}" class="btn btn-sm btn-info" style="font-size: 9px">
                  <i class="fas fa-database"></i> View
                </a>
                @if(auth()->user()->user_role == '3')
                  <a href="/peserta/editdata/{{ $peserta->id }}" class="btn btn-sm btn-warning" style="font-size: 9px">
                    <i class="fas fa-edit"></i> Update
                  </a>
                  <a href="/peserta/delete/{{ $peserta->id }}" class="btn btn-sm btn-danger" style="font-size: 9px" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                  </a>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-left font-weight-bold text-danger">Belum ada data peserta!</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    </div>
    </div>
@endsection
