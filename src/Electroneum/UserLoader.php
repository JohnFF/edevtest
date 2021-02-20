<?php

namespace App\Electroneum;

use App\Electroneum\UserFactory;

/**
 * Loads the users.
 */
class UserLoader {

    /**
     * Loads the user from the provided credentials
     *
     * @param string $username
     */
    public function load_user_into_session($username, $password): void {

        // Verify the username each time before it's loaded to prevent file
        // traversal attempts.
        Validator::verify_username_valid($username);

        // Do not check the password is valid upon load unless we subsequently
        // change password standards.

        // Reference the file formats in UserFactory so as not to have to update
        // them in two places.
        $rawStoredUserDetails = file_get_contents(UserFactory::STORAGE_FILEPATH . $username . UserFactory::STORAGE_FILETYPE);
        $storedUserDetails = json_decode($rawStoredUserDetails, true);

        if (!password_verify($password, $storedUserDetails['password_hash'])) {
            throw new Exception('Incorrect password.');
        }

        session_start();

        $_SESSION['user'] = [
            'username' => $storedUserDetails['username'],
            'first_name' => $storedUserDetails['first_name'],
        ];
    }

}
