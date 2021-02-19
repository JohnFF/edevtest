<?php

namespace App\Electroneum;

/**
 * Handles the creation and deletion of users.
 */
class UserFactory {

    const STORAGE_FILEPATH = '../Storage/';
    const STORAGE_FILETYPE = '.acc';

    // PASSWORD_DEFAULT is kept up to date as PHP evolves - future proof.
    const PASSWORD_HASH_ALGORITHM = PASSWORD_DEFAULT;

    /**
     * Creates the user from the provided input.
     * 
     * @param string $username
     * @param string $firstName
     * @param string $password
     */
    public static function create_user($username, $firstName, $password) {
        Validator::verify_username_valid($username);
        Validator::verify_password_valid($username);

        $passwordHash = password_hash($password, self::PASSWORD_HASH_ALGORITHM);

        // Only store the password hash, never the password, and never the
        // encrypted password.

        $userDetails = [
            'username' => $username,
            'first_name' => $firstName,
            'password_hash' => $passwordHash,
        ];

        // TODO check file doesn't exist first.

        file_put_contents(self::STORAGE_FILEPATH . $username . self::STORAGE_FILETYPE, json_encode($userDetails));
    }
    
    /**
     * Creates the user from the provided input.
     * 
     * @param string $username
     * @param string $password
     */
    public static function delete_user($username, $password) {
        // TODO
    }
}