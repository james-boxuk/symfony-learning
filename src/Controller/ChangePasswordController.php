<?php

namespace App\Controller;

use App\Command\ChangePasswordCommand;
use Exception;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordController extends AbstractController
{
    public function __construct(
        private ChangePasswordCommand $command
    ){}

    public function changeAction(Request $request)
    {
        $userId = $request->get('user_id');

        try {
            $user = $this->command->handle($userId);
            $this->addFlash('success', 'An email has been sent to ' . $user->getEmail());
        } catch (Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }

        return $this->redirectToRoute('app_edit_account', ['user_id' => $userId]);
    }
}
