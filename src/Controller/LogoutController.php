<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends AbstractController
{
    public function logout(Security $security): Response
    {
        //by calling the logout route, symfony will automatically un-authenticate the user
        $response = $security->logout(false);
        return $this->redirectToRoute('app_home');
    }
}
