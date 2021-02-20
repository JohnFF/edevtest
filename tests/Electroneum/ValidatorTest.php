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

        $didntFailValidation = '';

        foreach ($invalidValues as $eachInvalidValue) {
            try {
                call_user_func($validationFunction, $eachInvalidValue);
                $didntFailValidation = $eachInvalidValue;
            }
            catch (Exception $exception) {
                $caughtExceptions++;
            }
        }

        $this->assertEquals('', $didntFailValidation, 'Didn\'t fail validation as expected; ' . $didntFailValidation);
        $this->assertEquals(count($invalidValues), $caughtExceptions);
    }

    private function verify_valid_values_generic($validValues, $validationFunction) {
        $allPassedValidation = TRUE;
        try {
            foreach ($validValues as $eachValidValue) {
                call_user_func($validationFunction, $eachValidValue);
            }
        }
        catch (Exception $exception) {
            $allPassedValidation = FALSE;
        }

        $this->assertTrue($allPassedValidation, 'A valid value failed validation: ' . $eachValidValue);
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
            'MissingSpecCharacter1',
            'no space allowed',
            '_Invalidreallylongpasswordinvalidreallylongpassword',
        ];

        $this->verify_invalid_values_generic($invalidValues, array('App\\Electroneum\\Validator', 'verify_password_valid'));
    }

    public function test_verify_password_valid_valid_values() {
        $validValues = array(
            'Valid_Password1!',
            'Another_Valid_Password!1',
        );

        $this->verify_valid_values_generic($validValues, array('App\\Electroneum\\Validator', 'verify_password_valid'));
    }
}