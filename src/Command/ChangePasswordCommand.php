<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;

class ChangePasswordCommand
{
    public function __construct(
        private UserRepository $repository
    ){}

    public function handle(int $userId): User
    {
        $user = $this->repository->findBy(['id' => $userId]);



        return array_shift($user);
    }
}
