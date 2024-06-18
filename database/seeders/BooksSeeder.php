<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Books::create([
            'judul_buku' => 'mirna',
            'pengarang_id' => '1',
            'penerbit_id' => '1',
            'kategori_id' => '1',
            'tahun_terbit' => '2021',
            'foto' => "https://images.unsplash.com/photo-1495615080073-6b89c9839ce0?q=80&w=1506&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",

        ]);
    }
}
