<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminReplyContactController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function indexAction(Request $request): Response
    {
        $contact = new Contact();

        $contactForm = $request->get('contact_form');

        $contact
             ->setId($contactForm['id'])
             ->setAdminMessage($contactForm['admin_message'])
             ->setAdminReplied(1)
        ;

        $qb = $this->entityManager->createQueryBuilder();

        $qb->update(Contact::class, 'c')
            ->set("c.adminMessage", ':adminMessage')
            ->set("c.adminReplied", ':adminReplied')
            ->set('c.id', ':id')
            ->where('c.id = :id')
            ->setParameter('adminMessage', $contact->getAdminMessage())
            ->setParameter('adminReplied', $contact->getAdminReplied())
            ->setParameter('id', $contact->getId())
            ->getQuery()
            ->execute()
        ;

        return $this->redirectToRoute('app_view_contact');
    }
}
