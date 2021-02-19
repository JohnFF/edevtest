<?php

namespace App\Electroneum;

/**
 * This class stores the functions to validate user input.
 */
abstract class Validator {
    
    /**
     * Confirms whether or not this is a valid username.
     * 
     * Must prevent directory traversal.
     * 
     * @param string $input
     * @return bool
     */
    public static function verify_username_valid($input) : void {
        // TODO : not empty
        // TODO : max length
        // TODO : no special chars
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