<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CentralRouteTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_home_page_returns_successful_response(): void
    {

        $this->get('/')
             ->assertStatus(200);
    }

    public function test_siteadmins_page_returns_successful_response(): void
    {
        $user = \App\Models\User::factory()->create();

        $this->actingAs($user)
             ->get('/siteadmins')
             ->assertStatus(200);
    }

    public function test_superadmins_page_returns_successful_response(): void
    {
        $user = \App\Models\User::factory()->create();

        $this->actingAs($user)->get('/superadmins')->assertStatus(200);


    }

    public function test_dashboard_page_returns_successful_response(): void
    {
        $user = \App\Models\User::factory()->create();

        $this->actingAs($user)->get('/dashboard')->assertStatus(200);


    }

    public function test_sites_page_returns_successful_response(): void
    {
        $user = \App\Models\User::factory()->create();

        $this->actingAs($user)->get('/sites')->assertStatus(200);


    }

}
