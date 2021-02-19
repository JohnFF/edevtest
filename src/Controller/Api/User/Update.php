<?php

namespace App\Controller\Api\User;

use App\Electroneum\UserLoader;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Update extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function update($username): Response
    {
        $userLoader = new UserLoader();
        try {
            $userLoader->load_user($username);
            return new Response("Updated", self::SUCCESS_CODE);
        }
        catch (Exception $ex) {
            return new Response("Failed to update", self::FAILURE_CODE);
        }
    }
}