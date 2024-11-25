<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plotingpetugas extends Model
{
    use HasFactory;
    
    protected $table = 'ploting_petugas';

    public function profilpetugas()
{
    return $this->belongsTo(profilpetugas::class, 'kode_petugas', 'kode_petugas');
}

    public function masterresponden()
{
    return $this->belongsTo(masterresponden::class, 'kode_responden', 'kode_responden');
}

    public function masterkegiatan()
{
    return $this->belongsTo(masterkegiatan::class, 'kode_kegiatan', 'kode_kegiatan');
}
}