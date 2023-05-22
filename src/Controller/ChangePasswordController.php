<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordController extends AbstractController
{
    public function changeAction(Request $request)
    {
        dd($request);
    }
}
