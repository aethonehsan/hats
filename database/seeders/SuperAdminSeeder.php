<?php

namespace Database\Seeders;
use App\Models\SuperAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuperAdmin::create([
            'name' => 'Waqar',
            'email' => 'waqar@waqar.co',
            'password' => Hash::make('waqar@waqar.co'),
        ]);
    }
}
