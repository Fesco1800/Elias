<?php

session_start();
// Set database credentials
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "eliasdb";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

// Validation functions

function validatePhoneNumber($phone) {
    // Validate phone number format (Philippine format: +639 or 09)
    return preg_match('/^(?:\+639|09)\d{9}$/', $phone);
}

function validateEmail($email) {
    // Validate email format
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateName($name) {
    // Validate firstname, middlename, and lastname (should only contain letters)
    return preg_match('/^[A-Za-z]+$/', $name);
}

function validateBirthdate($birthdate) {
    // Validate birthdate format (assuming 'Y-m-d' format)
    $birthdateTimestamp = strtotime($birthdate);
    return $birthdateTimestamp && date('Y-m-d', $birthdateTimestamp) === $birthdate;
}

function areFieldsIdentical($existingValues, $postedValues) {
    foreach ($existingValues as $field => $value) {
        if ($value !== $postedValues[$field]) {
            return false;
        }
    }
    return true;
}

$requiredFields = array('url', 'username', 'password', 'email', 'phone', 'firstname', 'middlename', 'lastname', 'birthdate', 'address');
$emptyFields = array();

foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $emptyFields[] = ucfirst($field);
    }
}

if (!empty($emptyFields)) {
    $message = "Please fill in the following fields: " . implode(', ', $emptyFields) . ".";
} else {
    // All fields are filled, proceed with the update logic
    $aliasId = $_POST['alias_id'];
    $url = $_POST['url'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];

    // Perform validation checks
    $validationPassed = true; // Flag to track if all validation checks pass

    if (!validatePhoneNumber($phone)) {
        $message = "Invalid phone number format.";
        $validationPassed = false;
    }

    if (!validateEmail($email)) {
        $message = "Invalid email format.";
        $validationPassed = false;
    }

    if (!validateName($firstname) || !validateName($middlename) || !validateName($lastname)) {
        $message = "Invalid name format.";
        $validationPassed = false;
    }

    if (!validateBirthdate($birthdate)) {
        $message = "Invalid birthdate format.";
        $validationPassed = false;
    }

    if ($validationPassed) {
        // Fetch the existing values from the database
        $stmt = $conn->prepare("SELECT url, username, password, email, phone, firstname, middlename, lastname, birthdate, address FROM aliases WHERE id = ?");
        $stmt->bind_param("i", $aliasId);
        $stmt->execute();
        $stmt->bind_result($existingUrl, $existingUsername, $existingPassword, $existingEmail, $existingPhone, $existingFirstname, $existingMiddlename, $existingLastname, $existingBirthdate, $existingAddress);
        $stmt->fetch();
        $stmt->close();

        // Check if the fields are identical
        $existingValues = array(
            'url' => $existingUrl,
            'username' => $existingUsername,
            'password' => $existingPassword,
            'email' => $existingEmail,
            'phone' => $existingPhone,
            'firstname' => $existingFirstname,
            'middlename' => $existingMiddlename,
            'lastname' => $existingLastname,
            'birthdate' => $existingBirthdate,
            'address' => $existingAddress
        );

        $postedValues = array(
            'url' => $url,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'phone' => $phone,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'lastname' => $lastname,
            'birthdate' => $birthdate,
            'address' => $address
        );

        if (areFieldsIdentical($existingValues, $postedValues)) {
            $message = "There is nothing to update.";
        } else {
            // Prepare and execute the update statement
            $stmt = $conn->prepare("UPDATE aliases SET url = ?, username = ?, password = ?, email = ?, phone = ?, firstname = ?, middlename = ?, lastname = ?, birthdate = ?, address = ? WHERE id = ?");
            $stmt->bind_param("ssssssssssi", $url, $username, $password, $email, $phone, $firstname, $middlename, $lastname, $birthdate, $address, $aliasId);
            if ($stmt->execute()) {
                $message = "Alias updated successfully.";

                // Insert the changes into the history table
                $userId = $_SESSION['id'];
                $editedBy = $_SESSION['username'];
                $editTimestamp = date('Y-m-d H:i:s');

                // Prepare and execute the insert statement
                $stmt = $conn->prepare("INSERT INTO history (alias_id, user_id, edited_by, edit_timestamp, old_url, new_url, old_username, new_username, old_password, new_password, old_email, new_email, old_phone, new_phone, old_firstname, new_firstname, old_middlename, new_middlename, old_lastname, new_lastname, old_birthdate, new_birthdate, old_address, new_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("iissssssssssssssssssssss", $aliasId, $userId, $editedBy, $editTimestamp, $existingUrl, $url, $existingUsername, $username, $existingPassword, $password, $existingEmail, $email, $existingPhone, $phone, $existingFirstname, $firstname, $existingMiddlename, $middlename, $existingLastname, $lastname, $existingBirthdate, $birthdate, $existingAddress, $address);

                $stmt->execute();
            } else {
                $message = "Error updating alias.";
            }
            $stmt->close();
        }
    }
}

// Store the message in a session variable
$_SESSION['message'] = $message;

// Redirect to the desired page
header("Location: ../../client");

$conn->close();
?>
