@extends('layout1.app')

@section('title', 'Data Fasilitator')

@section('contents')
   <!-- <h2 class="text-center mb-4">Tambah Data Fasilitator</h2>-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <strong>Tambah Fasilitator</strong>
                       </div>
                       <div>
                            <a href="{{ route('fasilitator.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                <!--<div class="row justify-content-center">
                    <div class="col-6">
                        @if ($errors->any())
                            <div class="pt-3">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $item)
                                            <li>{{ $item }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif-->
                        <form action="{{ url('/fasilitator/insertdata') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="NIDN" class="form-label">NIDN:</label>
                                <input type="number" class="form-control" name="NIDN" placeholder="Enter NIDN">
                            </div>
                            <div class="mb-3">
                                <label for="Nama_Lengkap" class="form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control" name="Nama_Lengkap" placeholder="Enter Nama Lengkap">
                            </div>
                            <div class="mb-3">
                                <label for="Prodi" class="form-label">Prodi:</label>
                                <div class="input-group">
                                    <select name="Prodi" class="custom-select">                                        
                                        <option value="" selected>- Pilih Prodi -</option>
                                        <option value="Teknologi informasi">Teknologi Informasi</option>
                                        <option value="Teknik Sipil">Teknik Sipil</option>
                                        <option value="Pendidikan Bahasa dan Sastra Indonesia">Pendidikan Bahasa dan Sastra Indonesia</option>
                                        <option value="Pendidikan Bahasa dan Satra Jawa">Pendidikan Bahasa dan Satra Jawa</option>
                                        <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                        <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                                        <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                        <option value="Pendidikan Teknik Otomotif">Pendidikan Teknik Otomotif</option>
                                        <option value="Pendidikan Guru SD">Pendidikan Guru SD</option>
                                        <option value="Manajemen">Manajemen</option>
                                        <option value="Hukum">Hukum</option>
                                        <option value="Psikologi">Psikologi</option>
                                        <option value="Agribisnis">Agribisnis</option>
                                        <option value="Peternakan">Peternakan</option>
                                    </select>
                                    <!--<div class="input-group-append">
                                        <div class="input-group-text custom-select-icon" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
