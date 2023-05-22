<?php

namespace App\Command;

use App\Contracts\DoctrineObjectPersister\ObjectPersisterInterface;
use App\Entity\User;
use App\Repository\UserRepository;

class EditUserCommand
{
    public function __construct(
        private ObjectPersisterInterface $objectPersister,
        private UserRepository $userRepository
    ){}

    public function handle(int $userId): User
    {
        $user = $this->userRepository->findBy(['id' => $userId]);
        return array_pop($user);
    }
}
