<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignUpFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignUpController extends AbstractController
{
    public function indexAction(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(SignUpFormType::class, $user);

        $form->handleRequest($request);

        return $this->render('sign_up/index.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
