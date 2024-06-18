<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;
    protected $table = 'pengarangs';
    protected $primaryKey = 'idpengarang';
    protected $fillable = ['idpengarang', 'nama_pengarang'];
}
