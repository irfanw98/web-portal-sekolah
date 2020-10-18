@extends('template.master')

@section('title', 'Profile')

@section('header')

@endsection

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">

            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif

            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{ asset('images/'.$siswa->avatar) }}" class="img-circle" alt="Avatar" width="100" height="100">
                                <h3 class="name">{{ $siswa->nama_depan }}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{ $siswa->mapel->count() }} <span>Mata Pelajaran</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        {{ $siswa->rataRataNilai() }}<span>Rata - rata Nilai</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Info Profile</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis Kelamin<span>{{ $siswa->jenis_kelamin }}</span></li>
                                    <li>Alamat<span>{{ $siswa->alamat }}</span></li>
                                </ul>
                            </div>

                            <div class="text-center"><a href="/siswa/edit/{{ $siswa->id }}" class="btn btn-primary">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <h4 class="heading">{{ $siswa->nama_depan }} {{ $siswa->nama_belakang }} </h4>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Nilai
                        </button>
                        <!-- TABBED CONTENT -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mata Pelajaran</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Semester</th>
                                            <th>Nilai</th>
                                            <th>Guru</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($siswa->mapel as $mapel)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mapel->kode }}</td>
                                            <td>{{ $mapel->nama }}</td>
                                            <td>{{ $mapel->semester }}</td>
                                            <td><a href="#" class="nilai" data-type="text" data-pk="{{ $mapel->id }}" data-url="/api/siswa/editnilai/{{ $siswa->id }}" data-title="Masukan Nilai">{{ $mapel->pivot->nilai }}</a></td>
                                            <td><a href="/guru/profile/{{ $mapel->guru_id }}"> {{ $mapel->guru->nama }} </a></td>
                                            <td><a href="/siswa/deletenilai/{{ $siswa->id }}/{{ $mapel->id }}" class="btn btn-danger btn-sm" role="button" onclick="return confirm('Yakin?');"><i class="lnr lnr-trash"></i> Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END TABBED CONTENT -->
                        <div class="panel">
                            <div id="chartNilai">

                            </div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>

@endsection

@section('footer')
<script>
</script>
@endsection