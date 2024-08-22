<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Joke;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Exception;

/**
 * Class JokeTest
 *
 * This test class is responsible for testing the joke fetching and viewing functionality.
 *
 * Expected Output: 
 * - The `jokes:fetch` command should store a joke in the database.
 * - Jokes should be viewable via the API.
 */
class JokeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the joke fetching command.
     *
     * @return void
     */
    public function test_jokes_fetch_command(): void
    {
        try {
            $this->artisan('jokes:fetch')
                 ->expectsOutput('Joke fetched and stored successfully.')
                 ->assertExitCode(0);

            $this->assertDatabaseCount('jokes', 1); // Ensure a joke was inserted
        } catch (Exception $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }


     
     
     
    
     

    
}
