<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'idbuku';
    protected $fillable = [
        'idpenerbit',
        'judul_buku',
        'pengarang_id',
        'penerbit_id',
        'kategori_id',
        'tahun_terbit',
        'deskripsi',
        'foto',
        'status_buku',
    ];
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'pengarang_id', 'idpengarang');
    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'idpenerbit');
    }
    public function kategori()
    {
        return $this->belongsTo(Categories::class, 'kategori_id', 'idkategori');
    }
    public function borrowing()
    {
        return $this->hasOne(Borrow::class, 'buku_id', 'idbuku');
    }
}
