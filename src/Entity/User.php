<?php 

namespace App\Entity;

/**
 * Represents the user entity.
 * 
 */
class User {

    private $firstName;
    private $username;

    /**
     * Creates a user object.
     */
    public function __construct($firstName, $userName) {
        $this->firstName = $firstName;
        $this->username = $userName;
    }
    
    /**
     * Validates and sets the values.
     */
    public function set_values() {
        // TODO
    }
    
    /**
     * Saves the user object.
     */
    public function save() {
        // TODO
    }

    /**
     * Return an array of user variables.
     *
     * Could just use array cast and make some of the variables public, but
     * this isn't good practice.
     *
     * @return array
     */
    public function toArray() {
        return [
            'first_name' => $this->firstName,
            'username' => $this->username,
        ];
    }
    
}