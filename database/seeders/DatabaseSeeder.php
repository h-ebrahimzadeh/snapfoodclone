<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
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

        Role::create(['name'=>'user']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'seller']);

        User::create([
            'name'=>'admin',
            'password'=>Hash::make('12345678'),
            'email'=>'admin@a.com',
            'mobile_number'=>'09121234123',
            'role_id'=>Role::IS_ADMIN
        ]);

        User::create([
            'name'=>'seller',
            'password'=>Hash::make('12345678'),
            'email'=>'seller@a.com',
            'mobile_number'=>'09121234121',
            'role_id'=>Role::IS_SELLER
        ]);


    }
}
