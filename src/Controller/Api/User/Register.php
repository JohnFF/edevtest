<?php

namespace App\Controller\Api\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Register extends AbstractController
{
    const SUCCESS_CODE = 200;
    
    public function register(): Response
    {
        
        
        
        return new Response("Registered", self::SUCCESS_CODE);
    }
}
