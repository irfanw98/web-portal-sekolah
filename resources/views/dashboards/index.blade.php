@extends('template.master')

@section('title', 'Siswa')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
					 	<div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ranking 5 Besar</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach( ranking() as $s )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->namaLengkap() }}</td>
                                            <td>{{ $s->rataRataNilai }}</td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
				</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-user"></i></span>
								<p>
									<span class="number">{{ totalSiswa() }}</span>
									<span class="title">Jumlah Siswa</span>
								</p>
							</div>
					</div>
					<div class="col-md-3">
					<div class="metric">
						<span class="icon"><i class="fa fa-user"></i></span>
							<p>
								<span class="number">{{ totalGuru() }}</span>
								<span class="title">Jumlah Guru</span>
							</p>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>




@stop