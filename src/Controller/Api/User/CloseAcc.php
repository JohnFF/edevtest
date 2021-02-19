<?php

namespace App\Controller\Api\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CloseAcc extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function close_acc(): Response
    {
        $userFactory = new UserFactory();
        try {
            $userFactory->delete_user($username, $password);
            return new Response("Registered", self::SUCCESS_CODE);
        }
        catch (Exception $ex) {
            return new Response("Failed to close account", self::FAILURE_CODE);
        }
    }
}
