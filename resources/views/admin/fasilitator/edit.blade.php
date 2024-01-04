@extends('layoutadmin.app')

@section('title','Admin Fasilitator')
@section('contents')
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <strong>Update Data Fasilitator</strong>
                        </div>
                        <div>
                            <a href="/admin/fasilitator" class="btn btn-secondary btn-sm">
                                <i class="fas fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                <!--<div class="row justify-content-center">
                    <div class="col-6">-->
                    <form action="{{ url('/admin/fasilitator/updatedata/', $data->id) }}" method="POST">                       
            @csrf
            <!--Metode HTTP untuk Pembaruan-->
       
            <div class="mb-3">
                <label for="NIDN" class="form-label">NIDN:</label>
                <input type="number" class="form-control" name="NIDN" value="{{ $data->NIDN }}">
            </div>
            <div class="mb-3">
                <label for="Nama_Lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" name="Nama_Lengkap" value="{{ $data->Nama_Lengkap }}">
            </div>
            <!--<div class="mb-3">
                <label for="Prodi" class="form-label">Prodi:</label>
                <input type="text" class="form-control" name="Prodi" value="{{ $data->Prodi }}">
            </div>-->
            <div class="mb-3">
                <label for="Prodi" class="form-label">Prodi:</label>
                <div class="input-group">
                    <select name="Prodi" class="custom-select">                                        
                        <option value="" @if ($data->Prodi == '') selected @endif>- Pilih -</option>
                        <option value="Teknologi Informasi" @if ($data->Prodi == 'Teknologi Informasi') selected @endif>Teknologi Informasi</option>
                        <option value="Teknik Sipil" @if ($data->Prodi == 'Teknik Sipil') selected @endif>Teknik Sipil</option>
                        <option value="Pendidikan Bahasa dan Sastra Indonesia" @if ($data->Prodi == 'Pendidikan Bahasa dan Sastra Indonesia') selected @endif>Pendidikan Bahasa dan Sastra Indonesia</option>
                        <option value="Pendidikan Bahasa dan Sastra Jawa" @if ($data->Prodi == 'Pendidikan Bahasa dan Sastra Jawa') selected @endif>Pendidikan Bahasa dan Sastra Jawa</option>
                        <option value="Pendidikan Bahasa Inggris" @if ($data->Prodi == 'Pendidikan Bahasa Inggris') selected @endif>Pendidikan Bahasa Inggris</option>
                        <option value="Pendidikan Ekonomi" @if ($data->Prodi == 'Pendidikan Ekonomi') selected @endif>Pendidikan Ekonomi</option>
                        <option value="Pendidikan Matematika" @if ($data->Prodi == 'Pendidikan Matematika') selected @endif>Pendidikan Matematika</option>
                        <option value="Pendidikan Teknik Otomotif" @if ($data->Prodi == 'Pendidikan Teknik Otomotif') selected @endif>Pendidikan Teknik Otomotif</option>
                        <option value="Pendidikan Guru SD" @if ($data->Prodi == 'Pendidikan Guru SD') selected @endif>Pendidikan Guru SD</option>
                        <option value="Manajemen" @if ($data->Prodi == 'Manajemen') selected @endif>Manajemen</option>
                        <option value="Hukum" @if ($data->Prodi == 'Hukum') selected @endif>Hukum</option>
                        <option value="Psikologi" @if ($data->Prodi == 'Psikologi') selected @endif>Psikologi</option>
                        <option value="Agribisnis" @if ($data->Prodi == 'Agribisnis') selected @endif>Agribisnis</option>
                        <option value="Peternakan" @if ($data->Prodi == 'Peternakan') selected @endif>Peternakan</option>
                    </select>
                    <!--<div class="input-group-append">
                        <div class="input-group-text custom-select-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>-->
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
