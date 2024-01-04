@extends('layoutadmin.app')

@section('title','Data Peserta')
@section('contents')

<h1 class="text-center mb-4">Data Peserta Softskill</h1>

    <div class="container">
    <a href="/admin/peserta/create" class="btn btn-primary mb-3">Tambah Data Peserta</a>
        <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Prodi</th>
      <th scope="col">Level</th>
      <th scope="col">Tahun</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @forelse ($pesertas as $peserta)
    <tr>
    <th scope="row">{{ $no++ }}</th>
    <td>{{ $peserta->NIS }}</td>
    <td>{{ $peserta->nama_lengkap }}</td>
    <td>{{ $peserta->prodi }}</td>
    <td>{{ $peserta->level }}</td>
    <td>{{ $peserta->tahun }}</td>

    <td>
    <a href="/admin/peserta/tampilkandata/{{ $peserta->id }}" class="btn btn-sm btn-info">View</a>
 
    <a href="/admin/peserta/edit/{{ $peserta->id }}" class="btn btn-sm btn-warning">Edit</a>

    <a href="/admin/peserta/delete/{{ $peserta->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
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
@endsection