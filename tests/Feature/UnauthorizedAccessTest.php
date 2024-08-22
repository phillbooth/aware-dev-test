<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class UnauthorizedAccessTest extends TestCase
{
    public function test_unauthorized_access_to_api(): void
    {
        try {
            $response = $this->getJson('/api/jokes');

            $response->assertStatus(401); // Unauthorized
        } catch (\Throwable $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
}
