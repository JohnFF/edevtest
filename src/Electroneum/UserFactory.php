<?php

namespace App\Electroneum;

use App\Entity\User;
use App\Electroneum\UserLoader;

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
        Validator::verify_password_valid($password);

        $passwordHash = password_hash($password, self::PASSWORD_HASH_ALGORITHM);

        // Only store the password hash, never the password, and never the
        // encrypted password.

        $userDetails = [
            'username' => $username,
            'first_name' => $firstName,
            'password_hash' => $passwordHash,
            'feedback' => User::DEFAULT_FEEDBACK,
            'rating' => User::DEFAULT_RATING,
        ];

        $candidateFilename = self::STORAGE_FILEPATH . $username . self::STORAGE_FILETYPE;

        // If the file already exists, then that username is already taken.
        if (file_exists($password)) {
            throw new Exception('File already exists.');
        }

        file_put_contents($candidateFilename, json_encode($userDetails));
    }
    
    /**
     * Creates the user from the provided input.
     * 
     * @param string $username
     * @param string $password
     */
    public static function delete_user($username, $password) {

        // A near identical function could be made to see if the password matches
        // the user, but as that would be mostly duplication, it's better to
        // just attempt a load.
        UserLoader::load_user_with_password($username, $password);

        try {
            unlink(self::STORAGE_FILEPATH . $username . self::STORAGE_FILETYPE);
        }
        catch (Exception $exception) {
            throw new Exception('User doesn\'t exist');
        }
    }
}