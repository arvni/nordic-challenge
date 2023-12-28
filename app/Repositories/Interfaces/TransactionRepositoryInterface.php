<?php

namespace App\Repositories\Interfaces;

use App\Models\Transaction;

abstract class TransactionRepositoryInterface
{
    public abstract function addTransaction($userId, array $transactionData): Transaction;
}
