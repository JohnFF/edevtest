<?php

namespace App\Controller\Api\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CloseAcc extends AbstractController
{
    const SUCCESS_CODE = 200;
    
    public function close_acc(): Response
    {
        return new Response("Closed account", self::SUCCESS_CODE);
    }
}
