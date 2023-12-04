<?php

namespace Database\Seeders;

use App\Models\Biologo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiologosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Biologo::factory(5)->create();
    }
}
