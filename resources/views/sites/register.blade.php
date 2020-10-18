@extends('template.frontend')

@section('content')

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Pendaftaran
                </h1>
                <p class="text-white link-nav">
                    <a href="#">Home</a> <span class="lnr lnr-arrow-right"></span> <a href="#"> Pendaftaran</a>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="search-course-area relative" style="background: unset;">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 col-md-6 search-course-left">
                <h1>
                    Pendaftaran online<br>
                    Bergabung bersama kami
                </h1>
                <p>
                    Dengan kurikulum yang update dengan kebutuhan pasar, kami menjamin lulusan akan mudah terserap di dunia kerja.
                </p>
            </div>
            <div class="col-lg-7 col-md-6 search-course-right section-gap">
                {!! Form::open(['url' => '/postregister', 'class' => 'form-wrap', 'autocomplete' => 'off']) !!}
                <h4 class="pb-20 text-center mb-10">Formulir Pendaftaran</h4>
                {!! Form::text('nama_depan', '', ['class' => 'form-control', 'placeholder' => 'Nama depan']) !!}

                {!! Form::text('nama_belakang', '', ['class' => 'form-control', 'placeholder' => 'Nama belakang']) !!}

                <div class="form-select" id="service-select">
                    {!! Form::select('jenis_kelamin', ['' => 'Pilih jenis kelamin', 'L' => 'Laki-laki', 'P' => 'Perempuan'], ['style' => 'display: none;']); !!}
                </div>

                <label>
                    Tanggal Lahir : {!! Form::date('tgllahir', '') !!}
                </label>

                {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}

                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) !!}

                {!! Form::textarea('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}

                {!! Form::submit('Kirim', ['class' => 'primary-btn text-upppercase']); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@endsection