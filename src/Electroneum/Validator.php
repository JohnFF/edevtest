<?php

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
    public static function is_username_valid($input) : bool {
        // TODO
    }

}