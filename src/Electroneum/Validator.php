<?php

namespace App\Electroneum;

use Exception;

/**
 * This class stores the functions to validate user input.
 */
abstract class Validator {

    const VALID_USERNAME_REGEX = "/^[A-Za-z0-9]*$/";
    const MAX_USERNAME_LENGTH = 20;

    const VALID_PASSWORD_REGEX = '/(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[*.!@$%^&(){}\[\]:;<>,.?~_\+\-=|]).*$/';
    const MIN_PASSWORD_LENGTH = 6;
    const MAX_PASSWORD_LENGTH = 30;

    /**
     * Confirms whether or not this is a valid username.
     * 
     * Must prevent directory traversal.
     * 
     * @param string $input
     * @return bool
     */
    public static function verify_username_valid($input) : void {

        // Not empty
        if (empty($input)) {
            throw new Exception('Username is empty.');
        }

        // Doesn't exceed maximum length.
        if (strlen($input) > self::MAX_USERNAME_LENGTH) {
            throw new Exception('Username exceeds length.');
        }

        // Only valid characters.
        if (false == preg_match(self::VALID_USERNAME_REGEX, $input)) {
            throw new Exception('Username fails regex.');
        }
    }

    /**
     * Confirms whether or not this is a valid username.
     *
     * Must prevent directory traversal.
     *
     * @param string $input
     * @return bool
     */
    public static function verify_password_valid($input) : void {
        // Not empty
        if (empty($input)) {
            throw new Exception('Password is empty.');
        }

        // Doesn't exceed maximum length.
        if (strlen($input) < self::MIN_PASSWORD_LENGTH) {
            throw new Exception('Password under length.');
        }

        // Doesn't exceed maximum length.
        if (strlen($input) > self::MAX_PASSWORD_LENGTH) {
            throw new Exception('Password exceeds length.');
        }

        // Only valid characters.
        if (false == preg_match(self::VALID_PASSWORD_REGEX, $input)) {
            throw new Exception('Password fails regex.');
        }
    }

    /**
     *
     * @param string $feedback
     */
    public static function verify_feedback_valid($feedback) {
        
    }

    /**
     *
     * @param string $firstName
     */
    public static function verify_feedback_first_name($firstName) {

    }

    /**
     *
     * @param int $rating
     */
    public static function verify_feedback_rating($rating) {
        
    }

}