<?php


use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddMoneyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test successful add money.
     */
    public function testAddMoneySuccess(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $response = $this->postJson(route('add-money'), ["user_id" => $user->id, "amount" => 10000]);

        // Assert
        $response
            ->assertCreated()
            ->assertJson(fn(AssertableJson $json) => $json->has("reference_id"));
    }

    /**
     * Test successful add money with a negative value.
     */
    public function testAddMoneySuccessWithNegativeValue(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $response = $this->postJson(route('add-money'), ["user_id" => $user->id, "amount" => -10000]);

        // Assert
        $response
            ->assertCreated()
            ->assertJson(fn(AssertableJson $json) => $json->has("reference_id"));
    }

    /**
     * Test failed add money with a missing amount.
     */
    public function testFailedAddMoneyMissingAmount(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $response = $this->postJson(route('add-money'), ["user_id" => $user->id]);

        // Assert
        $response
            ->assertJsonValidationErrorFor('amount');
    }

    /**
     * Test failed add money with a missing user ID.
     */
    public function testFailedAddMoneyMissingUserId(): void
    {
        // Act
        $response = $this->postJson(route("add-money"), ["amount" => $this->faker->numberBetween(-1000, 1000)]);

        // Assert
        $response
            ->assertJsonValidationErrorFor('user_id');
    }

    /**
     * Test failed add money with a non-existent user ID.
     */
    public function testFailedAddMoneyNotFoundUserId(): void
    {
        // Act
        $response = $this->postJson(route('add-money'), ["user_id" => $this->faker->randomDigitNotZero(), "amount" => -10000]);

        // Assert
        $response
            ->assertJsonValidationErrorFor('user_id');
    }
}
