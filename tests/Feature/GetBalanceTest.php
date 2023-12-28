<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetBalanceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test getting balance with user ID.
     */
    public function testGetBalanceWithUserId(): void
    {
        // Arrange
        $user = User::factory()->create();
        $transactions = Transaction::factory(10)->create(["user_id" => $user]);

        // Act
        $response = $this->getJson(route("get-balance", ["user_id" => $user->id]));

        // Assert
        $response->assertOk()->assertJson([
            "balance" => $transactions->sum(fn($item) => $item->amount)
        ]);
    }

    /**
     * Test failing to get balance without user ID.
     */
    public function testFailedGetBalanceWithoutUserId(): void
    {
        // Act
        $response = $this->getJson(route("get-balance"));

        // Assert
        $response->assertJsonValidationErrorFor("user_id");
    }

    /**
     * Test failing to get balance with a non-existent user ID.
     */
    public function testFailedGetBalanceNotFoundUserId(): void
    {
        // Act
        $response = $this->getJson(route("get-balance"));

        // Assert
        $response->assertJsonValidationErrorFor("user_id");
    }
}
