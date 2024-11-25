<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitoring extends Model
{
    use HasFactory;
    
    protected $table = 'monitoring';

    public function profilpetugas()
{
    return $this->belongsTo(profilpetugas::class, 'kode_petugas', 'kode_petugas');
}

    public function masterresponden()
{
    return $this->belongsTo(masterresponden::class, 'kode_responden', 'kode_responden');
}

    public function statuspendataan()
{
    return $this->belongsTo(profilpetugas::class, 'kode_status', 'kode_status');
}
}
