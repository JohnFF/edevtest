<?php

namespace App\Controller\Api\User;

use Exception;

use App\Electroneum\UserLoader;
use App\Electroneum\Validator;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Update extends AbstractController
{
    const SUCCESS_CODE = 200;
    const FAILURE_CODE = 500;
    
    public function update(): Response
    {
        try {
            if(!isset($_SESSION))
            {
                session_start();
            }

            if (!array_key_exists('logged_in', $_SESSION)) {
                throw new Exception('Not logged in!');
            }

            if (!array_key_exists('username', $_SESSION['user']) ) {
                throw new Exception('Not logged in!');
            }

            $username = $_SESSION['user']['username'];

            Validator::verify_username_valid($username);

            $feedback = $_POST["feedback"];
            $firstName = $_POST["first_name"];
            $rating = $_POST["rating"];

            $userLoader = new UserLoader();
            $user = $userLoader->load_user($username);
            $user->update($feedback, $firstName, $rating);
            return new Response(json_encode('Updated'), self::SUCCESS_CODE);
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