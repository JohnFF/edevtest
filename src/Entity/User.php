<?php 

namespace App\Entity;

use App\Electroneum\Validator;
use App\Electroneum\UserFactory;

/**
 * Represents the user entity.
 * 
 */
class User {

    const DEFAULT_FEEDBACK = '';
    const DEFAULT_RATING = 5;

    private $feedback;
    private $firstName;

    private $passwordHash;
    private $rating;

    private $username;

    /**
     * Creates a user object.
     *
     * @param string $firstName
     * @param string $userName
     * @param string $feedback
     * @param string $rating
     * @param string $passwordHash
     */

    public function __construct($firstName, $userName, $feedback, $rating, $passwordHash) {
        $this->feedback = $feedback;
        $this->firstName = $firstName;
        $this->rating = $rating;
        $this->username = $userName;
        $this->passwordHash = $passwordHash;
    }
    
    /**
     * Validates and sets the values of user and saves the files.
     *
     * @param string $feedback
     * @param string $firstname
     * @param int $rating
     */
    public function update($feedback, $firstName, $rating) {

        Validator::verify_feedback_valid($feedback);
        Validator::verify_feedback_first_name($firstName);
        Validator::verify_feedback_rating($rating);

        $this->feedback =  htmlentities($feedback);
        $this->firstName = htmlentities($firstName);
        $this->rating = (int) $rating;

        $this->save();
    }
    
    /**
     * Saves the user object.
     */
    private function save() {
        $userDetails = [
            'username' => $this->username,
            'feedback' => $this->feedback,
            'first_name' => $this->firstName,
            'password_hash' => $this->passwordHash,
            'rating' => $this->rating,
        ];
        file_put_contents(UserFactory::STORAGE_FILEPATH . $this->username . UserFactory::STORAGE_FILETYPE, json_encode($userDetails));
    }

    /**
     * Return an array of user variables.
     *
     * Could just use array cast and make some of the variables public, but
     * this isn't good practice.
     *
     * @return array
     */
    public function getPublicValues() {
        return [
            'feedback' => $this->feedback,
            'first_name' => $this->firstName,
            'rating' => $this->rating,
            'username' => $this->username,
        ];
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
            'username' => $this->username,
            'feedback' => $this->feedback,
            'first_name' => $this->firstName,
            'password_hash' => $this->passwordHash,
            'rating' => $this->rating,
        ];
    }
    
}