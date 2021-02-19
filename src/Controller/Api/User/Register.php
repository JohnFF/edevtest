<?php

namespace App\Controller\Api\User;

use \App\Electroneum;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Register extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function register($username, $password): Response
    {
        $userFactory = new UserFactory();
        try {
            $userFactory->create_user($username, $password);
            return new Response("Registered", self::SUCCESS_CODE);
        }
        catch (Exception $exception) {
            return new Response("Failed to register", self::FAILURE_CODE);
        }
        
    }
}
