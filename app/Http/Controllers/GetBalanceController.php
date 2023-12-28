<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetBalanceRequest;
use App\Services\BalanceCalculator;

class GetBalanceController extends Controller
{
    protected BalanceCalculator $balanceCalculator;

    public function __construct(BalanceCalculator $balanceCalculator)
    {
        $this->balanceCalculator = $balanceCalculator;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(GetBalanceRequest $request)
    {
        $balance = $this->balanceCalculator->Calculate($request->get("user_id"));
        return response()->json(["balance" => $balance]);
    }
}
