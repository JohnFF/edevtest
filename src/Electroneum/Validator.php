<?php

namespace App\Electroneum;

use Exception;

/**
 * This class stores the functions to validate user input.
 */
abstract class Validator {

    const VALID_USERNAME_REGEX = "^[A-Za-z0-9]*$";

    const MAX_USERNAME_LENGTH = 20;
    
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
        // TODO : min length
        // TODO : max length
        // TODO : must contain a number
        // TODO : must contain a capital
    }

}