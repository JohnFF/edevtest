<?php

namespace App\Electroneum;

use App\Electroneum\UserFactory;
use App\Entity\User;

/**
 * Loads the users.
 */
class UserLoader {

    /**
     * Loads the user from the provided credentials
     *
     * @param string $username
     * @param string $password
     * @return User
     */

    public static function load_user($username): User {

        // Verify the username each time before it's loaded to prevent file
        // traversal attempts.
        Validator::verify_username_valid($username);

        // Do not check the password is valid upon load unless we subsequently
        // change password standards.

        // Reference the file formats in UserFactory so as not to have to update
        // them in two places.
        $rawStoredUserDetails = file_get_contents(UserFactory::STORAGE_FILEPATH . $username . UserFactory::STORAGE_FILETYPE);
        $storedUserDetails = json_decode($rawStoredUserDetails, true);

        return new User(
            htmlentities($storedUserDetails['first_name']),
            $storedUserDetails['username'],
            htmlentities($storedUserDetails['feedback']),
            (int) $storedUserDetails['rating'],
            $storedUserDetails['password_hash']
        );
    }

    /**
     *
     * @param string $username
     * @param string $password
     * @return User
     */
    public static function load_user_with_password($username, $password): User {

        $storedUserDetails = self::load_user($username);

        if (!password_verify($password, $storedUserDetails['password_hash'])) {
            throw new Exception('Incorrect password.');
        }

        return new User(
            $storedUserDetails['first_name'],
            $storedUserDetails['username'],
            $storedUserDetails['feedback'],
            $storedUserDetails['rating'],
            $storedUserDetails['password_hash']
        );
    }

    /**
     * Loads the user and puts his values in the session.
     *
     * @param string $username
     * @param string $password
     */
    public static function load_user_into_session($username, $password) {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $_SESSION['user'] = self::load_user_with_password($username, $password)->getPublicValues();
    }

}
