<?php

namespace App\Controller\Api\Auth;

use Exception;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SignOut extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;

    /**
     * Signs the user out.
     *
     * Doesn't require validation - if the user opens multiple tabs, clicks
     * sign out on one, then again on another, there is little consequence.
     *
     * Normally the rule with API classes is to pass them instantly to a class
     * to handle the function. In this case, that would be the only remaining
     * justification for Authenticator's existence, so it's best removed for
     * Occam's razor.
     *
     */
    public function sign_out(): Response
    {
        try{
            session_start();
            session_destroy();
            return new Response(json_encode("Signed out"), self::SUCCESS_CODE);
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
