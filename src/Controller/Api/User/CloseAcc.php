<?php

namespace App\Controller\Api\User;

use Exception;

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
            return new Response(json_encode('Registered'), self::SUCCESS_CODE);
        }
        catch (Exception $exception) {
            return new Response(
                json_encode(['error_message' => $exception->getMessage()]),
                self::FAILURE_CODE,
                ['Content-Type: application/json']
            );
        }
    }
}
