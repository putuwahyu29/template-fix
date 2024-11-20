<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginpetugas extends Model
{
    use HasFactory;
    protected $table = 'login_petugas';

    protected $fillable = [
        'Username',
        'Password',
        'email_petugas',
    ];

    public function daftarpetugas()
{
    return $this->belongsTo(daftarpetugas::class, 'email_petugas', 'email_petugas');
}
}