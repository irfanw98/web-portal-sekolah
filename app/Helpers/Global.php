<?php 

use App\siswa;
use App\Guru;

	function ranking()
	{
		$siswa = siswa::all();
    	$siswa->map( function($s) {
    		$s->rataRataNilai = $s->rataRataNilai();
    		return $s;
    	});
    	$siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
    	return $siswa;
 
	}

	function totalSiswa()
	{
		return siswa::count();
	}

	function totalGuru()
	{
		return Guru::count();
	}


 ?>