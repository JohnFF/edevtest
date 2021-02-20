<?php

namespace App\Controller\Pages;

use App\Electroneum\Validator;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Index extends AbstractController
{
    public function show(): Response
    {
        return $this->render('pages/index.html.twig', [
            'validation' => [
                'username' => [
                    'max_length' => Validator::MAX_USERNAME_LENGTH,
                    'regex' => Validator::VALID_USERNAME_REGEX,
                ],
                'password' => [
                    'min_length' => Validator::MIN_PASSWORD_LENGTH,
                    'max_length' => Validator::MAX_PASSWORD_LENGTH,
                    'regex' => Validator::VALID_PASSWORD_REGEX,
                ]
            ],
        ]);
    }
}
