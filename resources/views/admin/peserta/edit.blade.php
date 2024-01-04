@extends('layoutadmin.app')

@section('title','Data Peserta')
@section('contents')
    
    
    <div class="row justify-content-center">
            <div class="col-6"> 
            <div class="card">
                <div class="card-body">
                <form action="{{ url('/admin/peserta/updatedata', $data->id) }}" method="post">

                @csrf @method('PUT')

            <div class="mb-3">
                <label for="NIS" class="form-label">NIM:</label>
                <input type="text" class="form-control" name="NIS" value="{{ $data->NIS }}">
            </div>

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" name="nama_lengkap" value="{{ $data->nama_lengkap }}">
            </div>

            <div class="mb-3">
            <label for="prodi" class="form-label">Prodi:</label>
            <select class="custom-select" name="prodi">
            <option selected>Pilih Prodi</option>
            <option value="Teknologi Informasi">Teknologi Informasi</option>
            <option value="Teknik Sipil">Teknik Sipil</option>
            <option value="Manajemen">Manajemen</option>
            <option value="Teknnik Sipil">Hukum</option>
            <option value="Psikologi">Psikologi</option>
            </select>   
            </div>

            <div class="mb-3">
            <label for="level" class="form-label">Level:</label>
            <select class="custom-select" name="level">
                <option selected disabled>Pilih Level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>            
            </div>

            <div class="mb-3">
            <label for="tahun" class="form-label">Tahun:</label>
            <select class="custom-select" name="tahun">
                <option selected disabled>Pilih Tahun</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>         
            </div>
            <button type="submit" class="btn btn-primary" >Simpan Perubahan</button>
            <a href="/admin/peserta" class="btn btn-danger" style="margin-left: 289px;">Batal</a>

            </form>
                </div>
                </div>
            </div>
        </div>
@endsection
