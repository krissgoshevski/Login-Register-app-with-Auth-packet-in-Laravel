<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        
        $roles = ['Admin', 'Editor', 'Regular'];

        foreach($roles as $role) 
        {
            $r = new Role;
            $r->name = $role;
            $r->save();
        }
    }
}
