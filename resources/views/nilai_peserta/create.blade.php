@extends('layout1.app')

@section('title', 'Tambah Nilai Peserta')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>Tambah Nilai Peserta</strong>
                    <a href="{{ route('nilai_peserta.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('nilai_peserta.store') }}" id="nilai-peserta-form">
                        @csrf

                        <div class="mb-3">
                            <label for="pesertaa" class="form-label">Peserta:</label>
                            <select name="peserta_id" class="custom-select" required>
                                <option value="" selected disabled>Pilih Peserta</option>
                                @foreach ($pesertaa as $item)
                                    @if(is_object($item)) {{-- Pastikan $item adalah objek --}}
                                        <option value="{{ $item->id }}">{{ $item->NIM }} - {{ $item->nama_lengkap }}</option>
                                    @else
                                        {{-- Handle jika $item bukan objek --}}
                                        <option value="{{ $item }}">{{ $item }} - Nama Peserta Tidak Tersedia</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                       
            
                        <div class="mb-3">
                            <label for="fasilitator" class="form-label">Fasilitator:</label>
                            <select name="fasilitator_id" class="custom-select" required>
                                <option value="" selected disabled>Pilih Fasilitator</option>
                                @foreach ($fasil as $item)
                                    <option value="{{ $item->id }}">{{ $item->Nama_Lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nilai_akhir" class="form-label">Nilai Akhir:</label>
                            <input type="text" class="form-control" name="nilai_akhir" required>
                        </div>

                        <div class="mb-3">
                            <label for="presensi" class="form-label">Presensi:</label>
                            <select class="custom-select" name="presensi">
                                    <option value="">Pilih Presensi</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                            </select>            
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Level:</label>
                            <select class="custom-select" name="level">
                            <option selected>Pilih Level</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            </select>            
                        </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun:</label>
                            <select class="custom-select" name="tahun">
                            <option selected>Pilih Tahun</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            </select>         
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection