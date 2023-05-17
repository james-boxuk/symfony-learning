<?php

namespace App\SignUp;

use App\Contracts\DoctrineObjectPersister\ObjectPersisterInterface;
use App\Entity\User;

class SignUpCommandHandler
{
    public function __construct(
        private ObjectPersisterInterface $objectPersister
    ){}

    public function handle(User $user)
    {
        $this->objectPersister->persist($user);
        $this->objectPersister->flush();
    }
}
