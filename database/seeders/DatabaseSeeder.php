<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call user seeder
        $this->call(UserSeeder::class);

        // Call item seeder
        $this->call(ItemSeeder::class);
    }
}
