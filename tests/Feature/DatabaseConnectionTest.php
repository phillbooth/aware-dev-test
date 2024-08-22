<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Exception;

/**
 * Class DatabaseConnectionTest
 *
 * This test class is responsible for ensuring the database connection is working correctly.
 *
 * Expected Output: 
 * - The test should confirm that the database is connected.
 */
class DatabaseConnectionTest extends TestCase
{
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function test_database_connection(): void
    {
        try {
            $this->assertTrue(DB::connection()->getDatabaseName() !== null);
        } catch (Exception $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
}
