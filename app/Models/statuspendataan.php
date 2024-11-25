<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statuspendataan extends Model
{
    use HasFactory;
    protected $table = 'status_pendataan';

    public function monitoring()
{
    return $this->hasMany(monitoring::class, 'kode_status', 'kode_status');
}
}