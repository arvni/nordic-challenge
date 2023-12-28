<?php

namespace App\Services;

use App\Models\Transaction;
use Carbon\Carbon;

class CalculateTransactionsDailyAmount
{

    public static function calculate(Carbon $day)
    {
        return Transaction::whereBetween("created_at", [
            $day->startOf("day")->toDate(),
            $day->endOf("day")->toDate()
        ])->sum("amount");
    }
}
