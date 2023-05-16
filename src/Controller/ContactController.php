<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private ValidatorInterface $validator;

    public function __construct(
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator
    ) {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    public function index(Request $request): Response
    {
        $contact = new Contact();
        $contact->setIsAdminUser(false);
        $contact->setCreatedDate(new DateTimeImmutable());

        $form = $this->createForm(
            ContactFormType::class,
            $contact
        );

        $form->handleRequest($request);
        $errors = $this->validator->validate($form);

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $this->addFlash('error', $error->getMessage());
            }

            return $this->redirectToRoute('app_contact');
        }


        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($form->getData());
            $this->entityManager->flush();

            $this->addFlash('success', 'We\'ve received your message');

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'title' => 'Contact Us',
            'form' => $form->createView(),
        ]);
    }
}
