<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\Mapel;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
    	$siswa = siswa::find($id);
    	$siswa->mapel()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
