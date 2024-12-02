<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengguna',
        'deskripsi_laporan',
        'bukti_laporan',
        'status_laporan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function getRouteKeyName()
    {
        return 'id_laporan'; 
    }

}
