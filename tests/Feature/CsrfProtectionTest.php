<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class CsrfProtectionTest extends TestCase
{
    public function test_csrf_protection_on_jokes_post_route(): void
    {
        try {
            $response = $this->post('/jokes', [
                'joke' => 'A funny joke!',
            ]);

            $response->assertStatus(419); // 419 status code indicates CSRF token mismatch
        } catch (\Throwable $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
}
