<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'tb_booking';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_hotel',
        'nama_hotel',
        'id_user',
        'nama_user',
        'tgl_book',
        'jumlah_orang',
        'status',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}