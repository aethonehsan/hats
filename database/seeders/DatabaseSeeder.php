<?php


namespace Database\Seeders;
use App\Models\User;
use App\Models\SuperAdmin;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Stancl\Tenancy\Facades\Tenancy;
use App\Models\Driver;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {



        $user=SuperAdmin::create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => bcrypt('test@example.com'),
            'status'=> 1,
        ]);

        // $tenantId='0b9fc46e-eeac-494c-90a3-505df994c0c8';

        // Tenancy::find($tenantId)?->run(function () {
        //     $user=User::create([
        //         'name' => 'Test',
        //         'email' => 'test@example.com',
        //         'password' => bcrypt('test@example.com'),
        //     ]);

        //     Role::create([
        //         'name'=> 'Admin',
        //         'guard_name'=>'web',
        //     ]);
        //     Role::create([
        //         'name'=>'Driver',
        //         'guard_name'=>'web',
        //     ]);
        //     $user->AssignRole('Admin');
        // });



    }
}
