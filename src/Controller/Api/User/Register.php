<?php

namespace App\Controller\Api\User;

use Exception;

use \App\Electroneum\UserFactory;
use App\Electroneum\UserLoader;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Register extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;

    /**
     * The API call to register the new user.
     */
    public function register(): Response
    {
        try {
            $username = $_POST["username"];
            $firstName = $_POST["first_name"];
            $password = $_POST["password"];

            $userFactory = new UserFactory();
            $userFactory->create_user($username, $firstName, $password);
            UserLoader::load_user_into_session($username, $password);
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
