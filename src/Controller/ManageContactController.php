<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageContactController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index(Request $request): Response
    {
        $qb = $this->entityManager->createQueryBuilder();
        $contactId = $request->query->getInt('id', 0);

        try {
            $contactDetails = $qb->select('c')
                ->from(Contact::class, 'c')
                ->where('c.id = :id')
                ->setParameter(':id', $contactId)
                ->getQuery()
                ->getSingleResult()
            ;
        } catch (NoResultException|NonUniqueResultException $e) {
            $this->addFlash('error', 'No Contact Found');
            return $this->redirectToRoute('app_view_contact');
        }

        $form = $this->createForm(ContactFormType::class, $contactDetails);

        return $this->render('manage_contact/index.html.twig', [
            'title' => 'Manage Contact',
            'form' => $form->createView(),
            'adminReplied' => $contactDetails->getAdminReplied(),
        ]);
    }
}
