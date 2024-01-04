@extends('layout1.app')
@section('title', 'Data Nilai Peserta')

@section('contents')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Nilai Peserta</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">NIM:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->peserta->NIM }}</dd>
                        
                        <dt class="col-sm-4">Nama Peserta:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->peserta?->nama_lengkap }}</dd>
                        
                        <dt class="col-sm-4">Nama Fasilitator:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->fasilitator?->Nama_Lengkap }}</dd>

                        <dt class="col-sm-4">Nilai Akhir:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->nilai_akhir }}</dd>

                        <dt class="col-sm-4">Presensi:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->presensi }}</dd>

                        <dt class="col-sm-4">Total Nilai:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->total_nilai }}</dd>

                        <dt class="col-sm-4">Konversi Nilai:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->konversi_nilai }}</dd>
                        
                        <dt class="col-sm-4">Tahun:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->tahun }}</dd>
                        
                        <dt class="col-sm-4">Level:</dt>
                        <dd class="col-sm-8">{{ $nilaiPeserta->level }}</dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <a href="{{ route('nilai_peserta.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
