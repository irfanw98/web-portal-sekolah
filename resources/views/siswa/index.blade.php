@extends('template.master')

@section('title', 'Siswa')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Siswa</h3>
                            <div class="right">

                                <a type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#importSiswa"><span class="lnr lnr-upload"></span>
                                    Import Excel
                                </a>

                                <a href="/siswa/exportExcel" class="btn btn-sm btn-primary"><span class="lnr lnr-download"></span> Excel</a>

                                <a href="/siswa/exportPDF" class="btn btn-sm btn-primary"><span class="lnr lnr-download"></span> PDF</a>

                                <!-- Button trigger modal -->
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-plus-circle"> Tambah Siswa</span></a>
                            </div>
                        </div>



                        <div class="panel-body">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">No</th> -->
                                        <th scope="col">Nis</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jenis kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Rata-rata</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

<!-- Modal Import Excel -->
<div class="modal fade" id="importSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'siswa.import', 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                {!! Form::file('data_siswa') !!}

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-sm btn-primary" value="Import">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/create" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('Nis') ? ' has->error ' : '' }}">
                        <label for="Nis">Nis :</label>
                        <input type="text" class="form-control" id="Nis" name="Nis" placeholder="Nomor Induk Siswa" value="{{ old('Nis') }}">

                        @if($errors->has('Nis'))
                        <span class=" help-block">{{ $errors->first('Nis') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nama_depan') ? ' has->error ' : '' }}">
                        <label for="nama_depan">Nama depan :</label>
                        <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama depan" value="{{ old('nama_depan') }}">

                        @if($errors->has('nama_depan'))
                        <span class=" help-block">{{ $errors->first('nama_depan') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nama_belakang">Nama belakang :</label>
                        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama belakang" value="{{ old('nama_belakang') }}">
                    </div>
                    <div class=" form-group {{ $errors->has('tgllahir') ? ' has->error ' : '' }}">
                        <label for="tgllahir">Tanggal Lahir :</label>
                        <input type="text" class="form-control" id="tgllahir" name="tgllahir" placeholder="Y-M-D" value="{{ old('tgllahir') }}">

                        @if($errors->has('tgllahir'))
                        <span class=" help-block">{{ $errors->first('tgllahir') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has->error ' : '' }}">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">

                        @if($errors->has('email'))
                        <span class=" help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('jenis_kelamin') ? ' has->error ' : '' }}">
                        <label for="exampleFormControlSelect1">Jenis kelamin :</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                            <option value=" L" {{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
                            <option value="P" {{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                        </select>

                        @if($errors->has('jenis_kelamin'))
                        <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('alamat') ? ' has->error ' : '' }}">
                        <label for="alamat">Alamat :</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>

                        @if($errors->has('alamat'))
                        <span class=" help-block">{{ $errors->first('alamat') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('avatar') ? ' has->error ' : '' }}">
                        <label for="avatar">Avatar :</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">

                        @if($errors->has('avatar'))
                        <span class=" help-block">{{ $errors->first('avatar') }}</span>
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


@section('footer')
<script>
    $('#datatable').DataTable({
        processing: true,
        serverside: true,
        responsive: true,
        ajax: "{{ route('ajax.get.data.siswa') }}",
        columns: [
            // {
            //     data: 'DT_RowIndex',
            //     name: 'DT_RowIndex'
            // },
            {
                data: 'Nis',
                name: 'Nis'
            },
            {
                data: 'nama_lengkap',
                name: 'nama_lengkap'
            },
            {
                data: 'tgllahir',
                name: 'tgllahir'
            },
            {
                data: 'jenis_kelamin',
                name: 'jenis_kelamin'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'rata-rata',
                name: 'rata-rata'
            },
            {
                data: 'Aksi',
                name: 'Aksi'
            }
        ]
    });

    $('body').on('click', '.delete', function() {
        const siswa_id = $(this).attr('siswa->id');

        swal({
                title: "Yakin ?",
                text: "Data siswa dengan id " + siswa_id + " akan dihapus ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/siswa/delete/" + siswa_id + "";
                }
            });
    });
</script>
@endsection