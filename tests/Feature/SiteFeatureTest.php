<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Site;
use App\Models\SuperAdmin;
use App\Models\SiteAdmin;

class SiteFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_index_page()
    {
        $user = SuperAdmin::factory()->create(); // The create() method requires parentheses to work.
        $response = $this->actingAs($user)->get(route('sites.index')); // actingAs() should be called before making the request.


        $response->assertStatus(200);
   }

    /** @test */
    public function it_can_show_the_create_form()
    {
        $user=SuperAdmin::factory()->create();
        $response = $this->actingAs($user)->get(route(name: 'sites.create'));

        $response->assertStatus(200);
        $response->assertViewIs('sites.create');
    }

    /** @test */
    public function it_can_store_a_new_site()
    {
        $user=SuperAdmin::factory()->create();
        $siteadmin=SiteAdmin::factory()->create();

        $data = [
            'name' => 'Test Admin',
            'location' => 'Test Admin',
            'siteadmin' => $siteadmin->id,
            'status' => '1',
        ];

        $response = $this->actingAs($user)->post(route('sites.store'), $data);

        $response->assertRedirect(route('sites.index'));
        $response->assertSessionHas('success', 'Site created successfully!');
        $this->assertDatabaseHas('sites', [
            'name' => 'Test Admin',
            'location' => 'Test Admin',
            'siteadmin_id' => $siteadmin->id,
            'status' => '1',
        ]);
    }



        /** @test */
        public function it_can_show_the_edit_form()
        {

            $user = SuperAdmin::factory()->create();
            $site= Site::factory()->create();
            $response = $this->actingAs($user)->get(route('sites.edit', $site));
            $response->assertStatus(200);
            $response->assertViewIs('sites.edit');
            $response->assertViewHas('site', $site);
        }


    /** @test */
    public function it_can_update_a_site()
    {
        $user = SuperAdmin::factory()->create();
        $siteadmin = SiteAdmin::factory()->create();
        $site = Site::factory()->create();


        $data = [
            'name' => 'Updated Admin',
            'location' => 'updatedlocation',
            'siteadmin' => $siteadmin->id,
            'status' => '1',
        ];

        $response = $this->actingAs($user)->put(route(name: 'sites.update', parameters: $site->id), $data);

        $response->assertRedirect(route('sites.index'));
        $response->assertSessionHas('success', 'Site updated successfully!');
        $this->assertDatabaseHas('sites', [
            'name' => 'Updated Admin',
            'location' => 'updatedlocation',
            'siteadmin_id' => $siteadmin->id,
            'status' => '1',
        ]);
    }


    public function it_can_delete_a_site()
    {
        $user = SuperAdmin::factory()->create();
        $site= Site::factory()->create();

        $response = $this->actingAs($user)->delete(route('sites.destroy', $site->id));

        $response->assertRedirect(route('sites.index'));
        $response->assertSessionHas('success', 'Site deleted successfully!');

    }
}
