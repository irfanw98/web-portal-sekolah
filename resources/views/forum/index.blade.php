@extends('template.master')

@section('title', 'Forum')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Forum</h3>
                            <div class="right">

                                <!-- <a href="{{ route('posts.add') }}" class="btn btn-sm btn-primary">Tambah Forum</a> -->

                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-plus-circle"> Tambah Forum</span></a>

                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="list-unstyled activity-list">
                                @foreach ($forum as $frm)
                                <li>
                                    <img src="admin/assets/img/user.png" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="#">{{ $frm->user->siswa->nama_depan }}</a> : {{ $frm->judul }} <span class="timestamp">{{ $frm->created_at->diffForHumans() }}</span></p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Forum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/forum/create" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group {{ $errors->has('judul') ? ' has->error ' : '' }}">
                        <label for="judul">Judul :</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{ old('judul') }}">

                        @if($errors->has('judul'))
                        <span class=" help-block">{{ $errors->first('judul') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('konten') ? ' has->error ' : '' }}">
                        <label for="konten">Konten :</label>
                        <textarea class="form-control" name="konten" id="konten" rows="3">{{ old('konten') }}</textarea>

                        @if($errors->has('konten'))
                        <span class=" help-block">{{ $errors->first('konten') }}</span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection