<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use App\Services\GenerateTransactionRandomReferenceId;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'amount' => fake()->numberBetween(-100000, 100000),
            'reference_id' => GenerateTransactionRandomReferenceId::generate(),
        ];
    }
}
