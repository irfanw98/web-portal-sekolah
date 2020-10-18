@extends('template.master')

@section('title', 'Profile')

@section('header')

   <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

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
                                <img src="" class="img-circle" alt="Avatar">
                                <h3 class="name">{{ $guru->nama }}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                        </div>
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
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
                                            <th>Nama</th>
                                            <th>Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($guru->mapel as $mapel )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mapel->nama }}</td>
                                            <td>{{ $mapel->semester }}</td>
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

@section('chart')

@endsection