<?php

namespace App\Controller;

use App\Command\AllowPasswordChangeCommand;
use App\Form\ChangePasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowUserToChangePasswordController extends AbstractController
{

    public function __construct(
        private AllowPasswordChangeCommand $allowPasswordChangeCommand
    ){}

    public function indexAction(Request $request): Response
    {
        $form = $this->createForm(ChangePasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->allowPasswordChangeCommand->handle($request);
            $this->addFlash('success', 'Password updated successfully');
            return $this->redirectToRoute('app_edit_account', ['user_id' => $request->get('user_id')]);
        }

        return $this->render('allow_user_to_change_password/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
