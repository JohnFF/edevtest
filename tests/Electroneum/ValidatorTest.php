<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Electroneum\Validator;

final class EmailTest extends TestCase
{
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

        $caughtExceptions = 0;

        // $this->fail used to not throw Exception. It seems now it does.
        // Way to circumvent this is to throw specific types of Exception for
        // validation fails but for this project that would be overkill.
        $allFailedValidation = TRUE;

        foreach ($invalidValues as $eachInvalidValue) {
            try {
                Validator::verify_password_valid($eachInvalidValue);
                $allFailedValidation = FALSE;
            }
            catch (Exception $exception) {
                $caughtExceptions++;
            }
        }

        $this->assertTrue($allFailedValidation);
        $this->assertEquals(count($invalidValues), $caughtExceptions);

    }

    public function test_verify_username_valid_valid_values() {
        $validValues = array(
            'JohnKir',
            'ValidUsername',
            'AllTheTests',
        );

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

        $caughtExceptions = 0;

        // $this->fail used to not throw Exception. It seems now it does.
        // Way to circumvent this is to throw specific types of Exception for
        // validation fails but for this project that would be overkill.
        $allFailedValidation = TRUE;

        foreach ($invalidValues as $eachInvalidValue) {
            try {
                Validator::verify_password_valid($eachInvalidValue);
                $allFailedValidation = FALSE;
            }
            catch (Exception $exception) {
                $caughtExceptions++;
            }
        }

        $this->assertTrue($allFailedValidation);
        $this->assertEquals(count($invalidValues), $caughtExceptions);

    }

    public function test_verify_password_valid_valid_values() {
        $validValues = array(
            'Valid_Password1',
        );

        try {
            foreach ($validValues as $eachvalidValue) {
                Validator::verify_password_valid($eachValidValue);
            }
        }
        catch (Exception $exception) {
            $allPassedValidation = FALSE;
        }

        $this->assertTrue($allPassedValidation, 'A valid password failed validation: ' . $eachvalidValue);
    }
}