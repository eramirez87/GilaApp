<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Channel;

use App\Models\category_user;
use App\Models\channel_user;
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

        #Creacion de usuarios
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'demo@demo.com',
        ]);
        User::factory()->create([
            'name' => 'Jeane Doe',
            'email' => 'demo2@demo.com',
        ]);

        #Creacion de categorias
        Category::create([
            'name'=>'Deportes'
        ]);
        Category::create([
            'name'=>'Finanzas'
        ]);
        Category::create([
            'name'=>'Películas'
        ]);

        #Creacion de canales
        Channel::create([
            'name'=>'SMS'
        ]);
        Channel::create([
            'name'=>'Email'
        ]);
        Channel::create([
            'name'=>'Push Notification'
        ]);

        #Creacion de relacion Usuario-Categoria
        category_user::create([
            'user_id' => 1,
            'category_id' => 1
        ]);
        category_user::create([
            'user_id' => 2,
            'category_id' => 1
        ]);
        category_user::create([
            'user_id' => 1,
            'category_id' => 3
        ]);

        #Creacion de relacion Usuario-Canal
        channel_user::create([
            'user_id' => 1,
            'channel_id'=> 2
        ]);
        channel_user::create([
            'user_id' => 1,
            'channel_id'=> 3
        ]);
        channel_user::create([
            'user_id' => 2,
            'channel_id'=> 1
        ]);

    }
}
