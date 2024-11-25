<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datakabkot extends Model
{
    use HasFactory;
    
    protected $table = 'data_kabkot';

    public function profilpetugas()
    {
        return $this->hasMany(profilpetugas::class, 'kode_kabkot', 'kode_kabkot');
    }

    public function mastershp()
    {
        return $this->hasMany(mastershp::class, 'kode_kabkot', 'kode_kabkot');
    }

    public function plotingpetugas()
    {
        return $this->hasMany(plotingpetugas::class, 'kode_kabkot', 'kode_kabkot');
    }
}