<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsModel extends Model
{
    use HasFactory;

    protected $table = 'tb_hotels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'gambar',
        'id_lokasi',
        'nama_lokasi',
        'alamat',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
