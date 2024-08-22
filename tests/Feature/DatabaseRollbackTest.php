<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Joke;

class DatabaseRollbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_rollback_on_failure(): void
    {
        $this->expectException(\Exception::class);

        DB::beginTransaction();

        try {
            // Insert a joke
            Joke::create(['joke_id' => 'test123', 'joke' => 'A funny joke']);

            // Force an exception
            throw new \Exception('Forced exception');

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        $this->assertDatabaseMissing('jokes', ['joke_id' => 'test123']);
    }
}
