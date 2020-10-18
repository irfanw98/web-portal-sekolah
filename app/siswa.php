<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'user_id',
        'role',
        'avatar',
        'Nis',
        'nama_depan',
        'nama_belakang',
        'tgllahir',
        'jenis_kelamin',
        'alamat'
    ];

    // public function getAvatar()
    // {
    //     if (!$this->avatar) {
    //         return asset('admin/assets/img/user.png');
    //     }

    //     return asset('admin/assets/img/' . $this->avatar);
    // }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot('nilai')->withTimestamps();
    }

    public function rataRataNilai()
    {
        $totalNilai = 0;
        $totalMapel = 0;

        if ($this->mapel->isNotEmpty()) {

            foreach ($this->mapel as $mapel) {

                $totalNilai += $mapel->pivot->nilai;
                $totalMapel++;
            }
            return round($totalNilai / $totalMapel);
        };
        return 0;
    }

    public function namaLengkap()
    {
        return $this->nama_depan . ' ' . $this->nama_belakang;
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'user.png']);
    }
}
