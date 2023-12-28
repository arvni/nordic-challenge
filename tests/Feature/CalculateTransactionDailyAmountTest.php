<?php

namespace Tests\Feature;

use App\Jobs\CalculateTransactionDailyAmount;
use App\Models\Transaction;
use App\Models\User;
use App\Services\CalculateTransactionsDailyAmount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class CalculateTransactionDailyAmountTest extends TestCase
{
    use RefreshDatabase;

    public function testCalculateTransactionDailyAmountJob(): void
    {
        // Arrange

        $user = User::factory()->create();
        $transactions = Transaction::factory(10)->create(["user_id" => $user]);

        // Act
        $calculateService = app(CalculateTransactionsDailyAmount::class);
        CalculateTransactionDailyAmount::dispatch($calculateService);
        $this->expectOutputString('Calculation result: ' . $transactions->sum(fn($item) => $item->amount));


        // Assert
        $this->assertTrue(true);

        // Clean up
        Mockery::close();
    }
}
