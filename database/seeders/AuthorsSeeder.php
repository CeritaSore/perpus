<?php

namespace Database\Seeders;

use App\Models\Pengarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PharIo\Manifest\Author;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Pengarang::create(['nama_pengarang' => 'saiki']);
    }
}
