<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\siswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use PDF;
use App\siswa;
use App\User;
use App\Mapel;
use Yajra\DataTables\Contracts\DataTable;


class SiswaController extends Controller
{

    public function index()
    {
        $data_siswa = siswa::all();
        return view('siswa.index', compact('data_siswa'));
    }


    public function create(Request $request)
    {

        $request->validate([
            'Nis' => 'required|size:9',
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'tgllahir' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png'
        ]);

        //Insert ke table users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('student');
        $user->remember_token = Str::random(60);
        $user->save();

        //Insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = siswa::create($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('status', 'Data siswa berhasil ditambahkan!');
    }


    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }


    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('status', 'Data siswa berhasil diubah!');
    }

    public function delete(siswa $siswa)
    {
        $siswa->delete();
        return redirect('/siswa')->with('status', 'Data siswa berhasil dihapus!');
    }

    public function profile(Siswa $siswa)
    {
        $matapelajaran = Mapel::all();

        //Data Chart
        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('siswa.profile', [
            'siswa' => $siswa,
            'matapelajaran' => $matapelajaran,
            'categories' => $categories,
            'data' => $data
        ]);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = siswa::find($idsiswa);

        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {

            return redirect('/siswa/profile/' . $idsiswa)->with('error', 'Data mata pelajaran sudah ada!');
        }

        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('/siswa/profile/' . $idsiswa)->with('status', 'Data nilai berhasil ditambahkan!');
    }

    public function deletenilai($idsiswa, $idmapel)
    {
        $siswa = siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);

        return redirect()->back()->with('status', 'Data nilai berhasil dihapus!');
    }

    public function exportExcel()
    {
        return Excel::download(new siswaExport, 'siswa.xlsx');
    }

    public function exportPDF()
    {
        $siswa = siswa::all();
        $pdf = PDF::loadView('export.siswapdf', compact('siswa'));
        return $pdf->download('siswa.pdf');
    }

    public function getdatasiswa()
    {
        $siswa = siswa::select('siswa.*');

        return \DataTables::eloquent($siswa)
            ->addColumn('nama_lengkap', function ($s) {
                return $s->nama_depan . ' ' . $s->nama_belakang;
            })
            ->addColumn('rata-rata', function ($s) {
                return $s->rataRataNilai();
            })
            ->addColumn('Aksi', function ($s) {
                return '<a href="/siswa/profile/' . $s->id . '" class="btn btn-info btn-sm" role="button"><i class="lnr lnr-user"></i> View</a>

                <a href="/siswa/edit/' . $s->id . '" class="btn btn-warning btn-sm" role="button"><i class="lnr lnr-pencil"></i> Edit</a>

                <a href="" class="btn btn-danger btn-sm delete" role="button" siswa-id="{{ $s->id }}"><i class="lnr lnr-trash"></i> Delete</a>';
            })
            ->rawColumns(['nama_lengkap', 'rata-rata', 'Aksi'])
            ->toJson();
    }

    public function myprofile()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.myprofile', compact('siswa'));
    }

    public function importExcel(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('data_siswa'));
        return redirect()->back()->with('status', 'Data excel berhasil di import');
    }
}
