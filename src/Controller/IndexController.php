<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('main.html.twig', [
            'title' => 'Home of Symfony Learning',
        ]);
    }
}
