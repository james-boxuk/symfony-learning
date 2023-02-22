<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //map to contact entity before able to persist
            $contact = $form->getData();
            $this->entityManager->persist($contact);
        }

        return $this->render('contact/index.html.twig', [
            'title' => 'Contact Us',
            'form' => $form->createView(),
        ]);
    }
}
