<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteArchivedMesssageController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {}

    public function deleteMessage(Request $request): Response
    {
       $messageId = $request->get('message_id');

       $qb = $this->entityManager->createQueryBuilder();

        $result = $qb->delete(Contact::class, 'c')
            ->set('c.id', ':id')
            ->where('c.id = :id')
            ->setParameter(':id', $messageId)
            ->getQuery()
            ->execute();

        if ((bool)$result === false) {
            $this->addFlash('error', 'Message Was Not Deleted');
        } else {
            $this->addFlash('success', 'Message Deleted Successfully');
        }

        return $this->redirectToRoute('app_view_archived_messages');
    }
}
