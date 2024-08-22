<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Joke;

class EmptyDatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_empty_database(): void
    {
        try {
            $user = User::factory()->create();
            $this->actingAs($user);

            Joke::query()->delete(); // Clear all jokes

            $response = $this->get('/jokes');
            $response->assertSee('No jokes available.');
        } catch (\Throwable $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
}
