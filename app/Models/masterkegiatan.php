<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterkegiatan extends Model
{
    use HasFactory;
    
    protected $table = 'master_kegiatan'; // Ganti dengan nama tabel di database
    protected $fillable = ['kode_petugas', 'kegiatan_name'];

    public function plotingpetugas()
    {
        return $this->hasMany(PlotingPetugas::class, 'kode_kegiatan', 'kode_kegiatan');
    }
}