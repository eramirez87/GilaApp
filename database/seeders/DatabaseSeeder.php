<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Channel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'demo@demo.com',
        ]);
        User::factory()->create([
            'name' => 'Jeane Doe',
            'email' => 'demo2@demo.com',
        ]);
        Category::create([
            'name'=>'Deportes'
        ]);
        Category::create([
            'name'=>'Finanzas'
        ]);
        Category::create([
            'name'=>'Películas'
        ]);
        Channel::create([
            'name'=>'SMS'
        ]);
        Channel::create([
            'name'=>'Email'
        ]);
        Channel::create([
            'name'=>'Push Notification'
        ]);

    }
}
