<?php

namespace App\Controller\Api\Auth;

use Exception;

use App\Electroneum\UserLoader;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SignIn extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function sign_in(): Response
    {
        try {
            $username = $_POST["username"];
            $password = $_POST["password"];

            UserLoader::load_user_into_session($username, $password);
            return new Response(json_encode('Signed in'), self::SUCCESS_CODE);
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
