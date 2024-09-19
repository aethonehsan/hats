<?php



namespace Database\Factories;

use App\Models\SuperAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\SiteAdmin;
class SiteAdminFactory extends Factory
{
    protected $model = SiteAdmin::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password123'), // Or use Hash::make('password123')
            'status' => '1',
        ];
    }
}

