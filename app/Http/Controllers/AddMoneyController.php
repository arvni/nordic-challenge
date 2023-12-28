<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMoneyRequest;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AddMoneyController extends Controller
{
    protected TransactionRepositoryInterface $transactionRepository;
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository, TransactionRepositoryInterface $transactionRepository)
    {
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(AddMoneyRequest $request)
    {
        $user = $this->userRepository->getUser($request->get("user_id"));
        $transaction = $this->transactionRepository->addTransaction($user, $request->except("user_id"));
        return response()->json(["reference_id" => $transaction->reference_id],201);
    }
}
