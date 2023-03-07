<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Utilities\Paginator\Paginator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewArchivedMessagesController extends AbstractController
{

    public function __construct(private EntityManagerInterface $entityManager)
    {}

    public function indexAction(Request $request): Response
    {
        $qb = $this->entityManager->createQueryBuilder();

        $query = $qb->from(Contact::class, 'c')
            ->select('c')
            ->where('c.archivedDate is not null');

        $paginator = new Paginator();
        $paginator->paginate($query, $request->query->getInt('page', 1));

        return $this->render('view_archived_messages/index.html.twig', [
            'title' => 'Archived Messages',
            'paginator' => $paginator,
            'archivedMessaged' => $paginator->getItems()->getQuery()->getResult()
        ]);
    }
}
