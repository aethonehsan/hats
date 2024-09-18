<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Models\SuperAdmin;

class SuperAdminControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_index_page()
    {
        $response = $this->get(route('superadmins.index'));

        $response->assertStatus(200);
        $response->assertViewIs('superadmins.index');
    }

    /** @test */
    public function it_can_show_the_create_form()
    {
        $response = $this->get(route('superadmins.create'));

        $response->assertStatus(200);
        $response->assertViewIs('superadmins.create');
    }

    /** @test */
    public function it_can_store_a_new_super_admin()
    {
        $data = [
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => 'password123',
            'status' => 'active',
        ];

        $response = $this->post(route('superadmins.store'), $data);

        $response->assertRedirect(route('superadmins.index'));
        $response->assertSessionHas('success', 'User created successfully!');
        $this->assertDatabaseHas('super_admins', [
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'status' => 'active',
        ]);
    }

    /** @test */
    public function it_can_show_the_edit_form()
    {
        $user = SuperAdmin::factory()->create();

        $response = $this->get(route('superadmins.edit', $user->id));

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
            'status' => 'inactive',
        ];

        $response = $this->put(route('superadmins.update', $user->id), $data);

        $response->assertRedirect(route('superadmins.index'));
        $response->assertSessionHas('success', 'User Updated successfully!');
        $this->assertDatabaseHas('super_admins', [
            'name' => 'Updated Admin',
            'email' => 'updated@example.com',
            'status' => 'inactive',
        ]);
    }

    /** @test */
    public function it_can_delete_a_super_admin()
    {
        $user = SuperAdmin::factory()->create();

        $response = $this->delete(route('superadmins.destroy', $user->id));

        $response->assertRedirect(route('superadmins.index'));
        $response->assertSessionHas('success', 'User forcefully deleted successfully');

    }
}
