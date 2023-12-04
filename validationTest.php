<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/opdracht3.php';

class ValidationTest extends TestCase {
    public function testValidateData() {
        // Test with valid data
        $validData = [
            "email" => "test@test.nl",
            "likes" => 7,
            "reposts" => 8,
            "views" => 5
        ];

        $this->assertEmpty(validateData($validData), "Validation should succeed for valid data.");

        // Test with invalid email
        $invalidEmailData = [
            "email" => "invalid-email",
            "likes" => 7,
            "reposts" => 8,
            "views" => 5
        ];

        $this->assertNotEmpty(validateData($invalidEmailData), "Validation should fail for invalid email.");

        // Test with invalid value for views
        $invalidNumericData = [
            "email" => "test@test.nl",
            "likes" => 7,
            "reposts" => 8,
            "views" => 11
        ];

        $this->assertNotEmpty(validateData($invalidNumericData), "Validation should fail for invalid numeric value.");

        // Test with multiple errors
        $multipleErrorsData = [
            "email" => "invalid-email",
            "likes" => 0,
            "reposts" => 11, 
            "views" => 15 
        ];

        $this->assertCount(4, validateData($multipleErrorsData), "Multiple validation errors should be reported.");
    }
}
