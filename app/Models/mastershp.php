<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mastershp extends Model
{
    use HasFactory;

    protected $table = 'responden_shp';

    public function datakabkot()
{
    return $this->belongsTo(datakabkot::class, 'kode_kabkot', 'kode_kabkot');
}

    public function datakecamatan()
{
    return $this->belongsTo(datakecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
}

    public function datakeldes()
{
    return $this->belongsTo(datakeldes::class, 'kode_keldes', 'kode_keldes');
}

    public function masterresponden()
{
    return $this->belongsTo(masterresponden::class, 'kode_responden', 'kode_responden');
}

    public function kategoriKBLI()
{
    return $this->belongsTo(kategoriKBLI::class, 'kode_kbli', 'kode_kbli');
}

    public function KategoriLapanganUsaha()
{
    return $this->belongsTo(KategoriLapanganUsaha::class, 'kode_usaha', 'kode_usaha');
}

    public function statuspendataan()
{
    return $this->belongsTo(statuspendataan::class, 'kode_status', 'kode_status');
}
}
