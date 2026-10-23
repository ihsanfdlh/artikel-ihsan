<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\artikel;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        artikel::factory()->count(5)->create();
    }
}
