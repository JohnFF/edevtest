<?php

namespace App\Controller\Api\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SignIn extends AbstractController
{
    const SUCCESS_CODE = 200;
    
    public function sign_in(): Response
    {
        return new Response("Signed in", self::SUCCESS_CODE);
    }
}
