<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->createInitialUsers();
    }

    /**
     * Create Initial Users.
     */
    private function createInitialUsers(): void
    {
        if (User::all()->count() > 0) {
            return;
        }

        User::factory()->withIdentity()->create([
            'name' => 'creasi',
            'email' => 'admin@creasi.dev',
        ]);
    }
}
