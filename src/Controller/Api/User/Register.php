<?php

namespace App\Controller\Api\User;

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
        $username = $_POST["username"];
        $firstName = $_POST["first_name"];
        $password = $_POST["password"];

        $userFactory = new UserFactory();
        try {
            $userFactory->create_user($username, $firstName, $password);
            UserLoader::load_user_into_session($username, $password);
            return new Response("Registered", self::SUCCESS_CODE);
        }
        catch (Exception $exception) {
            return new Response("Failed to register", self::FAILURE_CODE);
        }
        
    }
}
