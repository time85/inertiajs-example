<?php

namespace Database\Seeders;

use App\Models\Aqe\People;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        People::factory()->count(100)->create();
        $this->call(UsersTableSeeder::class);
    }
}
