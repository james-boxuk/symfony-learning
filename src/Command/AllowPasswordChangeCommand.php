<?php

namespace App\Command;

use App\Contracts\DoctrineObjectPersister\ObjectPersisterInterface;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class AllowPasswordChangeCommand
{
    public function __construct(
        private UserRepository $userRepository,
        private ObjectPersisterInterface $persister
    ){}

    public function handle(Request $request)
    {
        $user = $this->userRepository->find($request->get('user_id'));
        $user->setPassword($request->get('change_password')['password']['first']);

        $this->persister->flush();
    }
}
