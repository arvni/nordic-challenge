<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class BalanceCalculator
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function Calculate($id)
    {
        $user = $this->userRepository->getUser($id);
        return $user->Transactions()->sum("amount");
    }
}
