<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            CategorySeeder::class,
            MenuSeeder::class,
            EventSeeder::class,
        ]);
        
        
        // User::factory(49)->create();
        User::Create([
            'name' => 'Admin Larassa',
            'username' => 'admin',
            'email' => 'larassa@gmail.com',
            'password' => bcrypt('larassaadmin123'),
            'is_admin' => 1,
        ]);
    }
}
