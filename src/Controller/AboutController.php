<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends AbstractController
{

    public function indexAction(): Response
    {
        return $this->render('about/index.html.twig', [
            'title' => 'About',
        ]);
    }
}
