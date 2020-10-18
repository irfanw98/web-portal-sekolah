<table>
	<thead>
		<tr>
			<th>Nis</th>
			<th>Nama Lengkap</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Rata-rata Nilai</th>
		</tr>
	</thead>
	<tbody>
		@foreach($siswa as $s)
		<tr>
			<td>{{ $s->Nis }}</td>
			<td>{{ $s->namaLengkap() }}</td>
			<td>{{ $s->tgllahir }}</td>
			<td>{{ $s->jenis_kelamin }}</td>
			<td>{{ $s->alamat }}</td>
			<td>{{ $s->rataRataNilai() }}</td>
		</tr>
		@endforeach
	</tbody>
</table>