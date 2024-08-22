<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\JokeService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Exception;
/**
 * Class JokeServiceTest
 *
 * This test class is responsible for testing the JokeService.
 * It ensures that jokes are correctly fetched from the external API
 * and stored in the database.
 *
 * Expected Output: 
 * - A successful joke fetch should store the joke in the database.
 * - The database should contain the joke with the correct attributes.
 */
class JokeServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_joke_from_api(): void
    {
        try {
            $mockHttpClient = Mockery::mock(Client::class);
            $mockHttpClient->shouldReceive('request')
                ->once()
                ->andReturn(new Response(200, [], json_encode(['id' => 'abc123', 'joke' => 'Test joke'])));

            // Inject the mocked client into JokeService
            $jokeService = new JokeService($mockHttpClient);

            // Since fetchAndStoreJoke returns void, no need to assert return value
            $jokeService->fetchAndStoreJoke();

            // Assert that the joke was stored in the database
            $this->assertDatabaseHas('jokes', ['joke_id' => 'abc123', 'joke' => 'Test joke']);
        } catch (Exception $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
}

