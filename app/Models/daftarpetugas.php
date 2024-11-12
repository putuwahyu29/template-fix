<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarpetugas extends Model
{
    use HasFactory;
    protected $table = 'profil_petugas';

    public function datakabkot()
{
    return $this->belongsTo(datakabkot::class, 'kode_kabkot', 'kode_kabkot');
}

    public function loginpetugas()
{
    return $this->belongsTo(loginpetugas::class, 'email_petugas', 'email_petugas');
}
}
