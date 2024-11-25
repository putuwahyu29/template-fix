<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mastershpb extends Model
{
    use HasFactory;

    protected $table = 'responden_shpb';

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

    public function kategoriSHPB()
{
    return $this->belongsTo(kategoriSHPB::class, 'kode_kategori', 'kode_kategori');
}

    public function statuspendataan()
{
    return $this->belongsTo(statuspendataan::class, 'kode_status', 'kode_status');
}
}
