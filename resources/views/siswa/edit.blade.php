@extends('template.master')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-3 text-center">UBAH DATA SISWA</h1>

                    <form action="/siswa/update/{{ $siswa->id }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Nis">Nis :</label>
                            <input type="text" class="form-control" id="Nis" name="Nis" placeholder="Nomor Induk Siswa" value="{{ $siswa->Nis }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_depan">Nama depan :</label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama depan" value="{{ $siswa->nama_depan }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_belakang">Nama belakang :</label>
                            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama belakang" value="{{ $siswa->nama_belakang }}">
                        </div>
                        <div class="form-group">
                            <label for="tgllahir">Tanggal Lahir :</label>
                            <input type="text" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal lahir" value="{{ $siswa->tgllahir }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis kelamin :</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar :</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="/siswa" class="btn btn-danger" role="button">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop