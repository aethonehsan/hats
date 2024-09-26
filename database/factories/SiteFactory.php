<?php

namespace Database\Factories;

use App\Models\Site;
use App\Models\SiteAdmin;
use App\Models\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    protected $model = Site::class;

    public function definition()
    {
        // Assuming a tenant context is initialized before using this factory
        $siteadmin = SiteAdmin::factory()->create(); // Generates a SiteAdmin instance

        return [
            'name' => $this->faker->word,
            'location' => $this->faker->word,  // Faker doesn't have a 'location', use 'address'
            'siteadmin_id' => $siteadmin->id,
            'status' => '1',  // Assuming 'status' is a static value for the site
        ];
    }
}


