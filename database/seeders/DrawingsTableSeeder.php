<?php

namespace Database\Seeders;

use App\Models\Drawing;
use Illuminate\Database\Seeder;

class DrawingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Drawing::factory()->count(10)->create();
    }
}
