@extends('layout1.app')
@section('title', 'Data Nilai Peserta')

@section('contents')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('nilai_peserta.index') }}" method="GET" class="mb-3">
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3">
                        <label for="tahun" class="form-label">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="custom-select">
                            <option value="">Semua Tahun</option>
                            @for ($year = 2022; $year <= 2024; $year++)
                                <option value="{{ $year }}" {{ $selectedTahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
 
                    <div class="col-md-3 mb-3">
                        <label for="level" class="form-label">Pilih Level:</label>
                        <select name="level" id="level" class="custom-select">
                            <option value="">Semua Level</option>
                            @for ($level = 1; $level <= 3; $level++)
                                <option value="{{ $level }}" {{ $selectedLevel == $level ? 'selected' : '' }}>Level {{ $level }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        @if(auth()->user()->user_role == '3')
        <div>
            <a href="{{ route('nilai_peserta.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus-circle"></i> Create New
            </a>
        </div>
         @elseif(auth()->user()->user_role == '2')
         <div>
            <a href="{{ route('nilai_peserta.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus-circle"></i> Create New
            </a>
        </div>        
        @endif
        <div class="card shadow mb-4" style="max-width: 1050px; margin: auto;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai Peserta</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="card-header d-flex justify-content-between" style="background-color: #ffffff;">
        <table class="table table-striped, table table-bordered mt-2" style="font-size: 10px">
        <thead class="table-dark" style="text-align: center;">
                <tr>
                
                    <th scope="col" style="width: 37%">Peserta</th> 
                    <th scope="col">Nama Fasilitator</th>
                    <th scope="col">Nilai Akhir</th>
                    <th scope="col">Presensi</th>
                    <th scope="col">Total Nilai</th>
                    <th scope="col">Konversi Nilai</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Level</th>
                    <th scope="col" style="width: 40%">Aksi</th>
                </tr>
            </thead>
            <tbody >
                @foreach($nilaiPesertas as $nilaiPeserta)
                    <tr>
                        <td>
                            @if ($nilaiPeserta->peserta && is_object($nilaiPeserta->peserta))
                                {{ $nilaiPeserta->peserta->NIM }} - {{ $nilaiPeserta->peserta->nama_lengkap }}
                            @else
                                Tidak Tersedia
                            @endif
                        </td>
                        <td>{{ $nilaiPeserta->fasilitator?->Nama_Lengkap }}</td>
                        <td style="text-align: center;">{{ $nilaiPeserta->nilai_akhir }}</td>
                        <td style="text-align: center;">{{ $nilaiPeserta->presensi }}</td>
                        <td style="text-align: center;">{{ $nilaiPeserta->total_nilai }}</td>
                        <td style="text-align: center;">{{ $nilaiPeserta->konversi_nilai }}</td>
                        <td style="text-align: center;">{{ $nilaiPeserta->tahun }}</td>
                        <td style="text-align: center;">{{ $nilaiPeserta->level }}</td>
                        <td>
                        <a href="{{ route('nilai_peserta.view', $nilaiPeserta->id) }}" class="btn btn-sm btn-info" style="font-size: 9px">
                                <i class="fas fa-database"></i> View
                            </a>
                            @if(auth()->user()->user_role == '3')
                            <a href="{{ route('nilai_peserta.edit', $nilaiPeserta->id) }}" class="btn btn-sm btn-warning" style="font-size: 9px">
                                <i class="fas fa-edit"></i> Update
                            </a>
                            <form action="{{ route('nilai_peserta.delete', $nilaiPeserta->id) }}" method="POST" class="d-inline" >
                                @csrf
                                <!-- Metode HTTP yang digunakan untuk menghapus data -->
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-flat confirm-delete" data-toggle="tooltip" title='Delete' style="font-size: 9px">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                            @elseif(auth()->user()->user_role == '2')
                            <a href="{{ route('nilai_peserta.edit', $nilaiPeserta->id) }}" class="btn btn-sm btn-warning" style="font-size: 9px">
                                <i class="fas fa-edit"></i> Update
                            </a>
                            <form action="{{ route('nilai_peserta.delete', $nilaiPeserta->id) }}" method="POST" class="d-inline" style="font-size: 9px">
                                @csrf
                                <!-- Metode HTTP yang digunakan untuk menghapus data -->
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-flat confirm-delete" data-toggle="tooltip" title='Delete' style="font-size: 9px">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
    @endsection
