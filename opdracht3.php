<?php
function validateData($data) {
    $errors = [];

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    $numericFields = ['likes', 'reposts', 'views'];
    foreach ($numericFields as $field) {
        if (!is_numeric($data[$field]) || $data[$field] < 1 || $data[$field] > 10) {
            $errors[] = "Invalid value for {$field}. It should be a numeric value between 1 and 10.";
        }
    }

    return $errors;
}

$requestData = [
    "email" => "test@test.nl",
    "likes" => 7,
    "reposts" => 8,
    "views" => 11
];

$validationErrors = validateData($requestData);

if (empty($validationErrors)) {
    $response = [
        "status" => "success",
        "message" => "Validation successful!"
    ];
} else {
    $response = [
        "status" => "error",
        "message" => "Validation failed:",
        "errors" => $validationErrors
    ];
}

header('Content-Type: application/json');

echo json_encode($response);
?>
