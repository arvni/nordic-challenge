<?php
namespace App\Repositories\Interfaces;

abstract class UserRepositoryInterface
{
    public abstract function getUser($id);
}
