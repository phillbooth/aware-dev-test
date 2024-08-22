<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AccessAfterLogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_access_to_jokes_after_logout(): void
    {
        try {
            // Create a user and log them in
            $user = User::factory()->create();
            $this->actingAs($user);
    
            // Start a session and retrieve the CSRF token
            Session::start();
            $csrfToken = Session::token();
    
            // Log out the user with the CSRF token
            $response = $this->post('/logout', [
                '_token' => $csrfToken,  // Pass the CSRF token
            ]);
    
            // Ensure logout was successful and user is redirected to the login page
            $response->assertRedirect('/login');
    
            // Try to access the jokes page after logout
            $response = $this->get('/jokes');
    
            // Assert that the response redirects to the login page
            $response->assertRedirect('/login');
        } catch (\Throwable $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
    
}
