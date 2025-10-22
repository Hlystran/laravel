<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'login' => 'Admin',
            'password' => 1111,
            'fio' => 'Администратор Системы',
            'phone' => '8(999)999-99-99',
            'email' => 'admin@korochki.ru',
            'is_admin' => true,
        ]);
    }
}
