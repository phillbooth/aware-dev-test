<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Exception;

/**
 * Class UserTest
 *
 * This test class is responsible for testing the User model.
 * It ensures that users are correctly created and stored in the database.
 *
 * Expected Output: 
 * - The database should contain the user with the correct attributes.
 * - The password should be correctly hashed.
 */
class UserTest extends TestCase
{
    use RefreshDatabase;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function test_user_creation(): void
    {
        try {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password123')
            ]);

            $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
            $this->assertTrue(Hash::check('password123', $user->password));
        } catch (Exception $e) {
            $this->fail('Exception thrown during test: ' . $e->getMessage());
        }
    }
}
