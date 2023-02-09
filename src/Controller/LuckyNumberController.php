<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;

class LuckyNumberController extends AbstractController
{
    /**
     * Undocumented function
     * @return Response
     */
    //#[Route('/lucky/number', name: 'app_lucky_number')]
    public function number(): Response
    {
        $number  = random_int(0, 100);


        return $this->render('lucky-number/display.html.twig', [
            'number' => $number,
        ]);
    }
}
