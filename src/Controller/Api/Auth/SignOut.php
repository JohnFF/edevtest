<?php

namespace App\Controller\Api\Auth;

use Exception;

use App\Electroneum\Authenticator;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SignOut extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function sign_out(): Response
    {
        try{
            session_start();
            if (!array_key_exists('logged_in', $_SESSION)) {
                throw new Exception('Not logged in');
            }

            Authenticator::sign_out();
            return new Response("Signed out", self::SUCCESS_CODE);
        }
        catch (Exception $ex) {
            return new Response("Failed to sign out", self::FAILURE_CODE);
        }
    }
}
