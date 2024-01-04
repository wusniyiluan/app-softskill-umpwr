@extends('layout1.app')

@section('title', 'Edit Nilai')

@section('contents')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                        <div class="card mb-5">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <strong>Update Nilai</strong>
                                </div>
                                <div>
                                    <a href="{{ route('nilai_peserta.index') }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-undo"></i> Back
                                    </a>
                                </div>
                            </div>
                            <div class="card-body mb-4">
                        <!--<div class="row justify-content-center">
                            <div class="col-6">-->
        <form action="{{ route('nilai_peserta.update', $nilaiPeserta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pesertaa" class="form-label">Nama Peserta:</label>
                <select name="peserta_id" class="custom-select" required>
                    <option value="" selected disabled>Pilih Nama Peserta</option>
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
                <label for="nilai_akhir" class="form-label">Nilai Akhir</label>
                <input type="text" class="form-control" id="nilai_akhir" name="nilai_akhir" value="{{ $nilaiPeserta->nilai_akhir }}" required>
            </div>
            <div class="mb-3">
                <label for="presensi" class="form-label">Presensi</label>
                <input type="text" class="form-control" id="presensi" name="presensi" value="{{ $nilaiPeserta->presensi }}" required>
            </div>
            <div class="mb-3">
                <label for="total_nilai" class="form-label">Total Nilai</label>
                <input type="text" class="form-control" id="total_nilai" name="total_nilai" value="{{ $nilaiPeserta->total_nilai }}" required>
            </div>
            <div class="mb-3">
                <label for="konversi_nilai" class="form-label">Konversi Nilai</label>
                <input type="text" class="form-control" id="konversi_nilai" name="konversi_nilai" value="{{ $nilaiPeserta->konversi_nilai }}" required>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $nilaiPeserta->tahun }}" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <input type="text" class="form-control" id="level" name="level" value="{{ $nilaiPeserta->level }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection