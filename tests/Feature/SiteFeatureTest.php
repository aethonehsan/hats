<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Site;
use App\Models\SuperAdmin;
use App\Models\SiteAdmin;
use App\Http\Middleware\CheckTenantStatus;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Domain;
use Stancl\Tenancy\Facades\Tenancy;

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
            'name' => 'Test',
            'location' => 'Test',
            'siteadmin' => $siteadmin->id,
            'status' => '1',
        ];

        $response = $this->actingAs($user)->post(route('sites.store'), $data);


        $this->assertDatabaseHas('sites', [
            'name' => 'Test',
            'location' => 'Test',
            'siteadmin_id' => $siteadmin->id,
            'status' => '1',
        ], 'mysql') ;

        $site = Site::where('name', 'Test')->first();
        $this->assertDatabaseHas('domains', [
            'domain' => 'Test.'.config('app.domain'),
            'site_id' =>$site->id,
        ]);

        Tenancy::find($site->id)?->run(function () use ($siteadmin): void {
            $this->assertDatabaseHas('users', [
                'name' => $siteadmin->name,
                'email' => $siteadmin->email,
                'status' => $siteadmin->status,
                'password'=> $siteadmin->password,
            ]);

         });



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
            $site->delete();
        }



 /** @test */
    public function it_can_update_a_site()
    {
        $user = SuperAdmin::factory()->create();
        $siteadmin = SiteAdmin::factory()->create();
        $site = Site::factory()->create();
        $domain= new Domain();
        $domain->domain="old" . "." . config('app.domain');
        $domain->site_id=$site->id;
        $domain->save();

        $site->domains= $domain;


        $data = [
            'name' => 'Updatedname',
            'location' => 'updatedlocation',
            'siteadmin' => $siteadmin->id,
            'status' => '1',
        ];

        $response = $this->actingAs($user)->put(route(name: 'sites.update', parameters: $site->id), $data);

        $response->assertRedirect(route('sites.index'));
        $response->assertSessionHas('success', 'Site updated successfully!');
        $this->assertDatabaseHas('sites', [
            'name' => 'Updatedname',
            'location' => 'updatedlocation',
            'siteadmin_id' => $siteadmin->id,
            'status' => '1',
        ]);


        Tenancy::find($site->id)?->run(function () use ($siteadmin): void {
            $this->assertDatabaseHas('users', [
                'name' => $siteadmin->name,
                'email' => $siteadmin->email,
                'status' => $siteadmin->status,
                'password'=> $siteadmin->password,
            ]);

         });

         $site = Site::where('name', 'Updatedname')->first();
         $this->assertDatabaseHas('domains', [
            'domain' => 'Updatedname.'.config('app.domain'),
            'site_id' =>$site->id,
        ]);
        $site->delete();
    }

 /** @test */








 public function test_site_with_status_zero_cannot_access()
 {
     // Create a user with status 0

     $site=Site::factory()->create(['status'=> 0]);
     $domain=new Domain();
     $domain->domain=$site->name.'.localhost';

     $domain->site_id=$site->id;
     $domain->save();
     $domain1=$domain->domain;

     $response = $this->get($domain1);

     // Assert that the user is not authenticated
     $response->assertStatus(404);

     // Assert that a redirection or error message occurs

 }
}
