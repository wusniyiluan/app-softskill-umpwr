@extends('layout1.app')
@section('title', 'Data Peserta')

@section('contents')
    <div class="container">
        <h2>Detail Data Peserta</h2>
        
        <ul>
            <li><strong>NIM:</strong> {{ $peserta->NIM }}</li>
            <li><strong>Nama Lengkap:</strong> {{ $peserta->nama_lengkap }}</li>
            <li><strong>Prodi:</strong> {{ $peserta->prodi }}</li>
            <li><strong>Level:</strong> {{ $peserta->level }}</li>
            <li><strong>Tahun:</strong> {{ $peserta->tahun }}</li>

            <!-- Masukkan informasi lain yang ingin Anda tampilkan -->
        </ul>

        <a href="{{ route('peserta.datapeserta') }}" class="btn btn-secondary">Kembali</a>
    </div>
    @endsection

