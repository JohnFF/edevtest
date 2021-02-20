<?php

namespace App\Electroneum;

/**
 * The Authenticator class handles the user's session.
 */
class Authenticator {
    
    /**
     * Check whether or not the username exists, and whether the password
     * matches.
     * 
     * @param string $username
     * @param string $password
     * 
     * @return bool whether the user was signed in.
     */
    private static function verify($username, $password) : bool {
        // TODO
    }
    
    /**
     * Signs the user in.
     * Intentionally obscure whether or not the username exists, for security 
     * reasons.
     * 
     * Future: record failed sign in attempts to prevent brute force. Drupal 7
     * does thi really well via its "flood" feature.
     * 
     * @param string $username
     * @param string $password
     * 
     * @return bool whether the user was signed in.
     */
    public static function sign_in($username, $password)  : bool {
        session_start();
        
        // TODO
    }
    
    /**
     * Signs the user out.
     * 
     * Doesn't require validation - if the user opens multiple tabs, clicks 
     * sign out on one, then again on another, there is little consequence.
     */
    public static function sign_out() {
        session_destroy();
    }

    /**
     *
     */
    public static function verify_user_logged_in() {
        // TODO
    }
}
