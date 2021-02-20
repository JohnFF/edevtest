<?php

namespace App\Controller\Api\Auth;
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
            Authenticator::sign_out();
            return new Response("Signed out", self::SUCCESS_CODE);
        }
        catch (Exception $ex) {
            return new Response("Failed to sign out", self::FAILURE_CODE);
        }
    }
}
