<?php

namespace App\Controller;

use App\Command\EditUserCommand;
use App\Form\UserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditAccountController extends AbstractController
{
    public function __construct(
        private EditUserCommand $command
    ){}

    public function editAction(Request $request): Response
    {
        $userId = (int)$request->get('user_id');
        $user = $this->command->handle($userId);

        $form = $this->createForm(UserFormType::class, $user);

        return $this->render('my-account/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
