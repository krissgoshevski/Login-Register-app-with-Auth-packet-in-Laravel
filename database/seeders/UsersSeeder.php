<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('password');
        $user->role_id = 1;
        $user->save();

        $user = new User;
        $user->name = 'Editor';
        $user->email = 'editor@example.com';
        $user->password = Hash::make('password');
        $user->role_id = 2;
        $user->save();

        $user = new User;
        $user->name = 'Regular';
        $user->email = 'regular@example.com';
        $user->password = Hash::make('password');
        $user->role_id = 3;
        $user->save();
    }
}
