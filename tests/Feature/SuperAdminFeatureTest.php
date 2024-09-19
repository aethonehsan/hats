<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Models\SuperAdmin;

class SuperAdminFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_index_page()
    {
        $user = SuperAdmin::factory()->create(); // The create() method requires parentheses to work.
        $response = $this->actingAs($user)->get(route('superadmins.index')); // actingAs() should be called before making the request.


        $response->assertStatus(200);
        $response->assertViewIs('superadmins.index');
    }

    /** @test */
    public function it_can_show_the_create_form()
    {
        $user=SuperAdmin::factory()->create();
        $response = $this->actingAs($user)->get(route(name: 'superadmins.create'));

        $response->assertStatus(200);
        $response->assertViewIs('superadmins.create');
    }

    /** @test */
    public function it_can_store_a_new_super_admin()
    {
        $user=SuperAdmin::factory()->create();
        $data = [
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => 'password123',
            'status' => '1',
        ];

        $response = $this->actingAs($user)->post(route('superadmins.store'), $data);

        $response->assertRedirect(route('superadmins.index'));
        $response->assertSessionHas('success', 'User created successfully!');
        $this->assertDatabaseHas('users', [
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'status' => '1',
        ]);
    }

    /** @test */
    public function it_can_show_the_edit_form()
    {

        $user = SuperAdmin::factory()->create();

        $response = $this->actingAs($user)->get(route('superadmins.edit', $user->id));

        $response->assertStatus(200);
        $response->assertViewIs('superadmins.edit');
        $response->assertViewHas('user', $user);
    }

    /** @test */
    public function it_can_update_a_super_admin()
    {
        $user = SuperAdmin::factory()->create();

        $data = [
            'name' => 'Updated Admin',
            'email' => 'updated@example.com',
            'password' => 'newpassword123',
            'status' => '1',
        ];

        $response = $this->actingAs($user)->put(route('superadmins.update', $user->id), $data);

        $response->assertRedirect(route('superadmins.index'));
        $response->assertSessionHas('success', 'User updated successfully!');
        $this->assertDatabaseHas('users', [
            'name' => 'Updated Admin',
            'email' => 'updated@example.com',
            'status' => '1',
        ]);
    }

    /** @test */
    public function it_can_delete_a_super_admin()
    {
        $user = SuperAdmin::factory()->create();

        $response = $this->actingAs($user)->delete(route('superadmins.destroy', $user->id));

        $response->assertRedirect(route('superadmins.index'));
        $response->assertSessionHas('success', 'User deleted successfully!');

    }
}
