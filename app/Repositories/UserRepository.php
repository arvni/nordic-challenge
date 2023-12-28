<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;

 use App\Models\User;

 class UserRepository extends UserRepositoryInterface
 {
    public function getUser($id) :User
    {
        return User::find($id);
    }
}
