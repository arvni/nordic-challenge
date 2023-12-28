<?php
namespace App\Services;

use App\Models\Transaction;

class GenerateTransactionRandomReferenceId
{

    public static function generate(): string
    {
        $referenceId=self::generateRandomNumber();
        while (Transaction::where("reference_id",$referenceId)->count() >0){
            $referenceId=self::generateRandomNumber();
        }
        return $referenceId;
    }

    protected static function generateRandomNumber(): string
    {
        $result = '';
        for ($i = 0; $i < 11; $i++) {
            $result .= random_int(0, 9);
        }
        return $result;

    }

}
