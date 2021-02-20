<?php

namespace App\Controller\Api\Auth;

use App\Electroneum\UserLoader;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SignIn extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function sign_in(): Response
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            UserLoader::load_user_into_session($username, $password);
            return new Response("Signed in", self::SUCCESS_CODE);
        }
        catch (Exception $ex) {
            return new Response("Failed to sign out", self::FAILURE_CODE);
        }
    }
}
