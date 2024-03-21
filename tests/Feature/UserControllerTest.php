<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_user_and_redirects_to_email_verification()
    {
        // Arrange: Prepare the necessary data.
        $userData = [
            'email' => 'test@example.com',
            'email_confirmation' => 'test@example.com', // Ensure this matches the 'email' field.
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '1234567890',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ];

        // Act: Make a POST request to the /register route.
        $response = $this->post(route('register'), $userData);

        // Assert: Check that the user was created and redirected to the verify email page.
        $response->assertRedirect('http://localhost/verify-email');
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

  /** @test */
public function it_logs_in_a_user_and_redirects_to_account_page()
{
    // Arrange: Create a user.
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    // Act: Make a POST request to the /signin route.
    $response = $this->post(route('signin'), [
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    // Assert: Check that the user was logged in and redirected to the account page.
    $response->assertRedirect(route('account'));
    $this->assertAuthenticatedAs($user);
}


    /** @test */
    public function it_logs_out_a_user_and_redirects_to_index_page()
    {
        // Arrange: Create and authenticate a user.
        $user = User::factory()->create();
        $this->actingAs($user);

        // Act: Make a GET request to the /logout route.
        $response = $this->get(route('logout'));

        // Assert: Check that the user was logged out and redirected to the index page.
        $response->assertRedirect(route('index'));
        $this->assertGuest();
    }

    /** @test */
    public function it_updates_user_account_details()
    {
        // Arrange: Create and authenticate a user.
        $user = User::factory()->create();
        $this->actingAs($user);

        // Prepare the new user data.
        $newUserData = [
            'email' => 'newemail@example.com',
            'email_confirmation' => 'newemail@example.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
            'phone' => '0987654321',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
        ];

        // Act: Make a POST request to the /account route.
        $response = $this->post(route('account'), $newUserData);

        // Assert: Check that the user details were updated.
        $this->assertDatabaseHas('users', ['email' => 'newemail@example.com']);
        $response->assertRedirect('http://localhost');
    }

    /** @test */
    public function it_sends_password_reset_link()
    {
        // Arrange: Create a user.
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Act: Make a POST request to the /forgot-password route.
        $response = $this->post(route('password.email'), ['email' => 'test@example.com']);

        // Assert: Check that the password reset link was sent.
        $response->assertSessionHas('status', trans(Password::RESET_LINK_SENT));
    }

    /** @test */
    public function it_resets_user_password()
    {
        // Arrange: Create a user.
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('oldpassword'),
        ]);

        // Create a password reset token for the user.
        $token = Password::createToken($user);

        // Prepare the new password data.
        $passwordData = [
            'token' => $token,
            'email' => 'test@example.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ];

        // Act: Make a POST request to the /reset-password route.
        $response = $this->post(route('password.update'), $passwordData);

        // Assert: Check that the user's password was reset.
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
        $response->assertSessionHas('status', trans(Password::PASSWORD_RESET));
    }
}
