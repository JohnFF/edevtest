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
            session_start();

            if (!array_key_exists('logged_in', $_SESSION)) {
                throw new Exception('Not logged in!');
            }

            if (!array_key_exists('username', $_SESSION['user']) ) {
                throw new Exception('Not logged in!');
            }

            $username = $_SESSION['user']['username'];

            Validator::verify_username_valid($username);

            $userLoader = new UserLoader();

            $feedback = $_POST["feedback"];
            $firstName = $_POST["first_name"];
            $rating = $_POST["rating"];

            $user = $userLoader->load_user($username);
            $user->update($feedback, $firstName, $rating);
            return new Response("Updated", self::SUCCESS_CODE);
        }
        catch (Exception $ex) {
            return new Response("Failed to update", self::FAILURE_CODE);
        }
    }
}