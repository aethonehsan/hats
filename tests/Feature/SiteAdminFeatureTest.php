<?php

namespace Tests\Feature;

use App\Models\SuperAdmin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\SiteAdmin;
use App\Models\User;
use App\Models\Site;
use Stancl\Tenancy\Facades\Tenancy;
use Illuminate\Support\Facades\Hash;

class SiteAdminFeatureTest extends TestCase
{
    use RefreshDatabase;
  /** @test */
    public function it_can_display_the_index_page()
    {
        $user = SuperAdmin::factory()->create(); // The create() method requires parentheses to work.
        $response = $this->actingAs($user)->get(route('siteadmins.index')); // actingAs() should be called before making the request.


        $response->assertStatus(200);
        $response->assertViewIs('siteadmins.index');
    }

    public function it_can_show_the_create_form()
    {
        $user=SuperAdmin::factory()->create();
        $response = $this->actingAs($user)->get(route(name: 'siteadmins.create'));

        $response->assertStatus(200);
        $response->assertViewIs('siteadmins.create');
    }


    public function it_can_store_a_new_site_admin()
    {
        $user=SuperAdmin::factory()->create();
        $data = [
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => 'password123',
            'status' => '1',
        ];

        $response = $this->actingAs($user)->post(route('siteadmins.store'), $data);

        $response->assertRedirect(route('siteadmins.index'));
        $response->assertSessionHas('success', 'User created successfully!');
        $this->assertDatabaseHas('siteadmins', [
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'status' => '1',
        ]);
    }

    public function it_can_show_the_edit_form()
    {

        $user = SuperAdmin::factory()->create();
        $siteadmin=SiteAdmin::factory()->create();
        $response = $this->actingAs($user)->get(route('siteadmins.edit', $siteadmin->id));

        $response->assertStatus(200);
        $response->assertViewIs('siteadmins.edit');
        $response->assertViewHas('siteadmin', $siteadmin);
    }

    public function it_can_update_a_site_admin()
    {
        $user = SuperAdmin::factory()->create();
        $site=Site::factory()->create();
        $siteadmin=$site->siteadmin;

        Tenancy::find($site->id)?->run(function () use ($siteadmin): void {
            $test=new User;
            $test=$siteadmin;
         });
         $data = [
            'name' => 'Updated Admin',
            'email' => 'updated@example.com',
            'password' => 'newpassword123',
            'status' => '1',
        ];

        $response = $this->actingAs($user)->put(route('siteadmins.update', $siteadmin->id), $data);

        $response->assertRedirect(route('siteadmins.index'));
        $response->assertSessionHas('success', 'User updated successfully!');
        $this->assertDatabaseHas('siteadmins', [
            'name' => 'Updated Admin',
            'email' => 'updated@example.com',
            'status' => '1',
        ]);

        $siteAdmin =SiteAdmin::where('email', 'updated@example.com')->first();
        $this->assertTrue(\Hash::check('newpassword123', $siteAdmin->password));
        Tenancy::find($site->id)?->run(function () use ($siteadmin): void {
            $this->assertDatabaseHas('users', [
                'name' => 'Updated Admin',
                'email' => 'updated@example.com',
                'status' => '1',
            ]);
            $user =User::where('email', 'updated@example.com')->first();
            $this->assertTrue(\Hash::check('newpassword123', $user->password));

         });
         $site->delete();
    }

    public function it_can_delete_a_site_admin()
    {
        $user=SuperAdmin::factory()->create();
        $site=Site::factory()->create();
        $siteadmin=$site->siteadmin;
        //check and delete siteadmin in site database user table
        Tenancy::find($site->id)?->run(function () use ($siteadmin): void {
           $test=new User;
           $test=$siteadmin;
        });

        $response = $this->actingAs($user)->delete(route('siteadmins.destroy', $siteadmin->id));

        $response->assertRedirect(route('siteadmins.index'));
        $response->assertSessionHas('success', 'User deleted successfully!');
        $this->assertDatabaseMissing('siteadmins', ['id' => $siteadmin->id]);

        Tenancy::find($site->id)?->run(function () use ($siteadmin): void {
            $this->assertDatabaseMissing('users', ['id' => $siteadmin->id]);

         });
         $site->delete();






    }
}
