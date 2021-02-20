<?php

namespace App\Controller\Api\User;

use App\Electroneum\UserFactory;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CloseAcc extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function close_acc(): Response
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        $password = $_POST["password"];

        $userFactory = new UserFactory();
        try {
            // Require the user password to delete the user.
            $userFactory->delete_user($_SESSION['user']['username'], $password);
            return new Response("Registered", self::SUCCESS_CODE);
        }
        catch (Exception $exception) {
            return new Response("Failed to close account", self::FAILURE_CODE);
        }
    }
}
