<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use App\Utilities\Paginator\Paginator;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewContactController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager= $entityManager;
    }

    public function indexAction(Request $request): Response
    {
       $db = $this->entityManager->createQueryBuilder();
       $query = $db->select("c")
           ->from(Contact::class, 'c');

        $paginator = new Paginator();
        $paginator->paginate($query, $request->query->getInt('page', 1));

        return $this->render('view_contact/index.html.twig', [
            'title' => 'View Contact Messages',
            'paginator' => $paginator,
            'contacts' => $paginator->getItems()->getQuery()->getResult(),
        ]);
    }
}
