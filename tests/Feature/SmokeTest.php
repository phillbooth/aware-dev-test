<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Exception;

/**
 * Class SmokeTest
 *
 * This test class is responsible for ensuring that critical application routes are responding.
 *
 * Expected Output: 
 * - The home, login, and registration routes should respond with status 200.
 */
class SmokeTest extends TestCase
{
    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function test_home_page(): void
    {
        try {
            $response = $this->get('/');
            $response->assertStatus(200);
        } catch (Exception $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }

    public function test_login_page(): void
    {
        try {
            $response = $this->get('/login');
            $response->assertStatus(200);
        } catch (Exception $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }

    public function test_registration_page(): void
    {
        try {
            $response = $this->get('/register');
            $response->assertStatus(200);
        } catch (Exception $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
}
