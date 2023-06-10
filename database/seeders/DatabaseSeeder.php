<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => fake()->name(),
            'image' => 'imageuser.jpg',
            'email' => 'admin@gmail.ma',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'), // password
            'role'=>'admin' ,
            'remember_token' => Str::random(10),
        ]);
    }
}
