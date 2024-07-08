<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase; // Reset the database after each test

    /**
     * Test the registration process.
     *
     * @return void
     */
    public function testRegistration()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302); // Ensure a redirect after successful registration

        $this->assertAuthenticated(); // Ensure the user is authenticated after registration

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    /**
     * Test the login process.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create([
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
        ]);

        $credentials = [
            'email' => 'jane@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/login', $credentials);

        $response->assertStatus(302); // Ensure a redirect after successful login

        $this->assertAuthenticated(); // Ensure the user is authenticated after login

        $response->assertSessionHasNoErrors(); // Ensure no errors are in the session
    }

    /**
     * Test the logout process.
     *
     * @return void
     */
    public function testLogout()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertStatus(302); // Ensure a redirect after logout

        $this->assertGuest(); // Ensure the user is not authenticated after logout
    }
}
