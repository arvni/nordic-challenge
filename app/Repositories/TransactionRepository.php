<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Services\GenerateTransactionRandomReferenceId;

class TransactionRepository extends TransactionRepositoryInterface
{
    protected Transaction $transaction;

    public function __construct(Transaction $transaction,)
    {
        $this->transaction = $transaction;
    }

    public function addTransaction($userId, array $transactionData): Transaction
    {
        $transaction = $this->transaction->newInstance([
            "amount" => $transactionData["amount"],
            "reference_id" => GenerateTransactionRandomReferenceId::generate()
        ]);
        $transaction->User()->associate($userId);
        $transaction->save();
        return $transaction;
    }

}
