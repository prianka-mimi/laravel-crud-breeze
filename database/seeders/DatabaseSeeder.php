<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Prianka Mimi',
            'email' => 'p@gmail.com',
            'username' => 'prianka-mimi',
            'password' => Hash::make('11'),
            'image'=>'wallpaper (13).jpg',
            'slug'=>'super-admin',
            'role'=>'1',
            'creator'=>'Prianka Mimi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'role_id'=>'1',
            'role_name'=>'Admin',
            'created_at' => now(),
        ]);
    }
}
