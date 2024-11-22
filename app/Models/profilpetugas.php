<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profilpetugas extends Model
{
    use HasFactory;
    
    protected $table = 'profil_petugas';

    public function datakabkot()
{
    return $this->belongsTo(datakabkot::class, 'kode_kabkot', 'kode_kabkot');
}

public function plotingpetugas()
{
    return $this->belongsTo(plotingpetugas::class, 'kode_petugas', 'kode_petugas');
}
}