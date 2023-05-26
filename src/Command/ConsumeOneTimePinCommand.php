<?php

namespace App\Command;

use App\Contracts\DoctrineObjectPersister\ObjectPersisterInterface;
use App\Repository\UserRepository;

class ConsumeOneTimePinCommand
{
    public function __construct(
        private UserRepository $userRepository,
        private ObjectPersisterInterface $persister
    ){}

    public function handle(string $pin, int $userId)
    {
        $user = $this->userRepository->find($userId);

        if ($pin === $user->getOneTimePin()) {
            $user->setOneTimePin(null);
            $this->persister->flush();
        }
    }
}
