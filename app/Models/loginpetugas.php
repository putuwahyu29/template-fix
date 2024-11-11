<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginpetugas extends Model
{
    use HasFactory;
    protected $table = 'login_petugas';

    public function profilpetugas()
    {
        return $this->hasOne(daftarpetugas::class, 'id', 'id');
    }
}