<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Electroneum\Validator;

final class EmailTest extends TestCase
{
    private function verify_invalid_values_generic($invalidValues, $validationFunction) {
        $caughtExceptions = 0;

        // $this->fail used to not throw Exception. It seems now it does.
        // Way to circumvent this is to throw specific types of Exception for
        // validation fails but for this project that would be overkill.
        $allFailedValidation = TRUE;

        foreach ($invalidValues as $eachInvalidValue) {
            try {
                call_user_func($validationFunction, $eachInvalidValue);
                $allFailedValidation = FALSE;
            }
            catch (Exception $exception) {
                $caughtExceptions++;
            }
        }

        $this->assertTrue($allFailedValidation);
        $this->assertEquals(count($invalidValues), $caughtExceptions);
    }

    private function verify_valid_values_generic($validValues, $validationFunction) {
        try {
            foreach ($validValues as $eachvalidValue) {
                Validator::verify_password_valid($eachValidValue);
            }
        }
        catch (Exception $exception) {
            $allPassedValidation = FALSE;
        }

        $this->assertTrue($allPassedValidation, 'A valid username failed validation: ' . $eachvalidValue);
    }

    public function test_verify_username_valid_invalid_values() {

        $invalidValues = [
            null,
            '',
            '!!!!!!!',
            '@invalid_username',
            'invalid\username',
            'invalidreallylongusernameinvalidreallylongusername',
            'no space allowed',
        ];

        $this->verify_invalid_values_generic($invalidValues, array('App\\Electroneum\\Validator', 'verify_username_valid'));
    }

    public function test_verify_username_valid_valid_values() {
        $validValues = array(
            'JohnKir',
            'ValidUsername',
            'AllTheTests',
        );

        $this->verify_valid_values_generic($validValues, array('App\\Electroneum\\Validator', 'verify_username_valid'));
    }

    public function test_verify_password_valid_invalid_values() {

        $invalidValues = [
            null,
            '',
            '@missing_upper_case_letter1',
            '@Missing_Number',
            'MissingCharacter1',
            'no space allowed',
            '_Invalidreallylongpasswordinvalidreallylongpassword',
        ];

        $this->verify_invalid_values_generic($invalidValues, array('App\\Electroneum\\Validator', 'verify_password_valid'));
    }

    public function test_verify_password_valid_valid_values() {
        $validValues = array(
            'Valid_Password1',
            'Another_Valid_Password1',
        );

        $this->verify_valid_values_generic($validValues, array('App\\Electroneum\\Validator', 'verify_password_valid'));
    }
}