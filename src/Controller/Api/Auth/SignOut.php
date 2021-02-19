<?php

namespace App\Controller\Api\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SignOut extends AbstractController
{
    const SUCCESS_CODE = 200;
    
    public function sign_out(): Response
    {
        return new Response("Signed out", self::SUCCESS_CODE);
    }
}
