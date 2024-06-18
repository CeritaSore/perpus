<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrow';
    protected $fillable = ['idpeminjaman', 'buku_id', 'tanggal_peminjaman', 'lama_peminjaman', 'status', 'user_id'];
    protected $primaryKey = 'idpeminjaman';
    public function books()
    {
        return $this->belongsTo(Books::class, 'buku_id', 'idbuku');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
}
