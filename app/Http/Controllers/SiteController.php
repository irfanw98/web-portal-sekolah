<?php

namespace App\Http\Controllers;

use App\Mail\NotifPendaftaranSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\siswa;
use App\User;
use App\Post;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();

        return view('sites.home', compact('posts'));
    }

    public function about()
    {
        return view('sites.about');
    }

    public function register()
    {
        return view('sites.register');
    }

    public function postregister(Request $request)
    {
        //INPUT PENDAFTARAN SEBAGAI USER
        //Insert ke table user
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        //Insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = siswa::create($request->all());

        //KIRIM EMAIL MAILTRAP
        // Mail::raw('Selamat Bergabung ' . $user->name, function ($message) use ($user) {
        //     $message->to($user->email, $user->name);
        //     $message->subject('Selamat anda terdaftar sebagai siswa/siswi SMAN7 Kota Cirebon');
        // });

        Mail::to($user->email)->send(new NotifPendaftaranSiswa);


        return redirect('/')->with('status', 'Pendaftaran Berhasil!');
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        return view('sites.singlepost', compact('post'));
    }
}
