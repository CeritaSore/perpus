<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'idkategori';
    protected $fillable = ['idkategori', 'kategori'];
    public function books()
    {
        return $this->hasMany(Books::class, 'kategori_id', 'idkategori');
    }
}
