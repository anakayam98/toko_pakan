@extends('layouts.master')
@section('layouts')

<div class="container-fluid">
    <h4 class="h4 mb-3 text-gray-800">Tambah Pelanggan</h4>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('pelanggan.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                <label for="kd_pelanggans">Kode Pelanggan </label>
                    <input type="text" id="kd_pelanggans" class="form-control" name="kd_pelanggans" value="{{ $newKodePelanggan }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nama_pelanggan">Nama Pelanggan</label>
                    <input class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan" type="text" placeholder="" name="nama_pelanggan">
                    @error('nama_pelanggan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                <div class="input-group-prepend">
                        <label for="weight" class="input-group-text">No Telp</label>
                    </div>
                    <input class="form-control @error('no_telepon') is-invalid @enderror" type="text" id="no_telepon" name="no_telepon" aria-label="">
                    @error('no_telepon')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success" style="float: right;">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
