<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterresponden extends Model
{
    use HasFactory;
    
    protected $table = 'master_responden';

    public function monitoring()
{
    return $this->hasMany(monitoring::class, 'kode_responden', 'kode_responden');
}

    public function mastershp()
{
    return $this->hasOne(mastershp::class, 'kode_responden', 'kode_responden');
}

    public function mastershpb()
{
    return $this->hasOne(mastershpb::class, 'kode_responden', 'kode_responden');
}
}