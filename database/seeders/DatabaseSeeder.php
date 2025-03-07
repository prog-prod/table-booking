<?php

namespace Database\Seeders;

use App\Models\Table;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Table::factory()->count(10)->create();
    }
}
