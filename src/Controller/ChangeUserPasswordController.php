<?php

namespace App\Controller;

use App\Command\ConsumeOneTimePinCommand;
use App\Entity\User;
use App\Form\OneTimePinType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeUserPasswordController extends AbstractController
{
    public function __construct(
        private ConsumeOneTimePinCommand $consumeToken
    ){}

    public function changeAction(Request $request): Response
    {
        $pin = $request->get('one_time_pin')['one_time_pin'] ?? null;
        $userId = $request->get('user_id');

        $form = $this->createForm(OneTimePinType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->consumeToken->handle($pin, $userId);
            return $this->redirectToRoute('app_allow_user_to_change_password', ['user_id' => $userId]);
        }

        return $this->render('change_user_password/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
