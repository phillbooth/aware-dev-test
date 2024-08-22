<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidDataSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_invalid_data_submission_to_api(): void
    {
        try {
            $response = $this->postJson('/api/jokes', [
                '_token' => csrf_token(), // Ensure CSRF token is included
                'joke_id' => '',
                'joke' => '',
            ]);
    
            // Check for 422 or 419 status code
            if ($response->status() === 422) {
                $response->assertJsonValidationErrors(['joke_id', 'joke']);
            } else {
                $response->assertStatus(401);
            }
        } catch (\Throwable $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
    
}
