@extends('layout1.app')

@section('title', 'Data Fasilitator')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card mb-5">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <strong>Detail Fasilitator</strong>
                </div>
                <div>
                    <a href="{{ route('fasilitator.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-undo"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>NIDN:</strong> {{ $fasilitator->NIDN }}</li>
                    <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $fasilitator->Nama_Lengkap }}</li>
                    <li class="list-group-item"><strong>Prodi:</strong> {{ $fasilitator->Prodi }}</li>
                </ul>
            </div>
            <!--<div class="card-footer">
                <a href="{{ route('fasilitator.index') }}" class="btn btn-secondary">Kembali</a>
            </div>-->
        </div>
    </div>
</div>
</div>
    @endsection