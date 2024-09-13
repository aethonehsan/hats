<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Stancl\Tenancy\Facades\Tenancy;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        SuperAdmin::create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => bcrypt('test@example.com'),
        ]);

    

        $tenantId='0b9fc46e-eeac-494c-90a3-505df994c0c8';

        Tenancy::find($tenantId)?->run(function () {
            User::create([
                'name' => 'Test',
                'email' => 'test@example.com',
                'password' => bcrypt('test@example.com'),
            ]);
        });

    }
    
}
