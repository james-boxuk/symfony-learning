<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeUserPasswordController extends AbstractController
{
    public function changeAction(Request $request): Response
    {
        $oneTimePin = $request->get('one_time_pin');
        $userId = $request->get('user_id');

        dd($oneTimePin, $userId);
        return $this->render('change_user_password/index.html.twig', [

        ]);
    }
}
