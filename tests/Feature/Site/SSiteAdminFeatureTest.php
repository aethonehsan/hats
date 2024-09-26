<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Models\Site\User;
use App\Models\Site;
use Illuminate\Validation\ValidationException;
use Stancl\Tenancy\Facades\Tenancy;


class SSiteAdminFeatureTest extends TestCase
{
    use RefreshDatabase;
  /** @test */
    public function it_can_display_the_index_page()
    {
        $site=Site::factory()->create();
        Tenancy::find($site->id)?->run(function () use ($site): void {
            $user = User::factory()->create(); // The create() method requires parentheses to work.
            $response = $this->actingAs($user)->get(route('users.index')); // actingAs() should be called before making the request.
            $response->assertStatus(200);
            $response->assertViewIs('users.index');

         });




    }


 /** @test */
    public function it_can_show_the_create_form()
    {
        $user=User::factory()->create();
        $response = $this->actingAs($user)->get(route(name: 'users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('users.create');
    }


 /** @test */
    public function it_can_store_a_new_super_admin()
    {
        $user=User::factory()->create();
        $data = [
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => 'password123',
            'status' => '1',
        ];

        $response = $this->actingAs($user)->post(route('users.store'), $data);

        $response->assertRedirect(route('users.index'));
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

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('users.edit', $user->id));

        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user', $user);
    }


 /** @test */
    public function it_can_update_a_super_admin()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Updated Admin',
            'email' => 'updated@example.com',
            'password' => 'newpassword123',
            'status' => '1',
        ];

        $response = $this->actingAs($user)->put(route('users.update', $user->id), $data);

        $response->assertRedirect(route('users.index'));
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
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(route('users.destroy', $user->id));

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success', 'User deleted successfully!');
        $this->assertDatabaseMissing('users', ['id'=>$user]);

    }


 /** @test */
 public function test_user_with_status_zero_cannot_login()
    {
        // Create a user with status 0
        $user = User::factory()->create(['status' => 0, 'password' => bcrypt('password')]);

        // Attempt to log in with the created user's credentials
        $data=[
            'email' => $user->email,
            'password' => 'password',
        ];
        $response = $this->post('/login', $data);

        // Assert that the user is not authenticated
        $this->assertGuest();

        // Assert that a redirection or error message occurs
        $response->assertSessionHasErrors('email');
    }

}
