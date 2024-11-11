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
    return $this->belongsTo(datakecamatan::class, 'kdkec', 'kdkec');
}

    public function datakeldes()
{
    return $this->belongsTo(datakeldes::class, 'kdkeldes', 'kdkeldes');
}

    public function kategoriKBLI()
{
    return $this->belongsTo(kategoriKBLI::class, 'kode_kbli', 'kode_kbli');
}

    public function klu()
{
    return $this->belongsTo(klu::class, 'klu_code', 'klu_code');
}

    public function statuspendataan()
{
    return $this->belongsTo(statuspendataan::class, 'kode_status', 'kode_status');
}
}
