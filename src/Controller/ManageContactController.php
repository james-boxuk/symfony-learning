<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use InvalidArgumentException;
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

    public function indexAction(Request $request): Response
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

    public function archiveMessageAction(Request $request): Response
    {
        try {
            //if its text, this will convert it to a 0
            $contactId = (int) $request->get('contact_id');

            if ($contactId === 0) {
                throw new InvalidArgumentException('Invalid Request Made');
            }
        } catch (InvalidArgumentException $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('app_view_contact');
        }

        $qb = $this->entityManager->createQueryBuilder();

        $contact = new Contact();
        $contact
            ->setId($contactId)
            ->setArchivedDate(new DateTimeImmutable())
        ;

        $qb->update(Contact::class, 'c')
            ->set('c.archivedDate', ':archivedDate')
            ->set('c.id', ':id')
            ->where('c.id = :id')
            ->setParameter(':archivedDate', $contact->getArchivedDate())
            ->setParameter(':id', $contact->getId())
            ->getQuery()
            ->execute();

        $this->addFlash('success', 'Contact Message Archived');

        return $this->redirectToRoute('app_view_contact');
    }
}
