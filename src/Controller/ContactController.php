<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    public function index(): Response
    {
        $form = $this->createForm(ContactFormType::class);

        return $this->render('contact/index.html.twig', [
            'title' => 'Contact Us',
            'form' => $form->createView(),
        ]);
    }
}
