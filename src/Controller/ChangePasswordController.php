<?php

namespace App\Controller;

use App\Command\ChangePasswordCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordController extends AbstractController
{
    public function __construct(
        private ChangePasswordCommand $command
    ){}

    public function changeAction(Request $request)
    {
        //get id
        $userId = $request->get('user_id');
        //insert into command to handle mailing of user
        $user = $this->command->handle($userId);
        $this->addFlash('success', 'An email has been sent to ' . $user->getEmail());

        //return message to contact edit profile to mention email has been sent
        return $this->redirectToRoute('app_edit_account', ['user_id' => $userId]);
    }
}
