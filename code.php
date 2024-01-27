<?php
require 'dbcon.php';

// Function to validate email format
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone number format (simple check for 10 digits)
function isValidPhone($phone) {
    return preg_match('/^\d{10}$/', $phone);
}

if (isset($_POST['delete_contact'])) {
    $contact_id = mysqli_real_escape_string($con, $_POST['contact_id']);

    $query = "DELETE FROM contacts WHERE id='$contact_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Contact deleted successfully'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Contact not deleted'
        ];
        echo json_encode($res);
        return false;
    }
}

if (isset($_POST['update_contact'])) {
    $contact_id = mysqli_real_escape_string($con, $_POST['contact_id']);
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Validate email and phone
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($message)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    if (!isValidEmail($email)) {
        $res = [
            'status' => 422,
            'message' => 'Please enter a valid email address'
        ];
        echo json_encode($res);
        return false;
    }

    if (!isValidPhone($phone)) {
        $res = [
            'status' => 422,
            'message' => 'Please enter a valid 10-digit phone number'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE contacts SET firstName='$firstName', lastName='$lastName', email='$email', phone='$phone', message='$message' WHERE id='$contact_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Contact updated successfully'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Contact not updated'
        ];
        echo json_encode($res);
        return false;
    }
}

if (isset($_GET['contact_id'])) {
    $contact_id = mysqli_real_escape_string($con, $_GET['contact_id']);

    $query = "SELECT * FROM contacts WHERE id='$contact_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $contact = mysqli_fetch_array($query_run);
        $res = [
            'status' => 200,
            'message' => 'Contact fetch successfully by ID',
            'data' => $contact
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Contact ID not found'
        ];
        echo json_encode($res);
        return false;
    }
}

if (isset($_POST['save_contact'])) {
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Validate email and phone
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($message)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    if (!isValidEmail($email)) {
        $res = [
            'status' => 422,
            'message' => 'Please enter a valid email address'
        ];
        echo json_encode($res);
        return false;
    }

    if (!isValidPhone($phone)) {
        $res = [
            'status' => 422,
            'message' => 'Please enter a valid 10-digit phone number'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO contacts (firstName, lastName, email, phone, message) VALUES ('$firstName', '$lastName', '$email', '$phone', '$message')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Contact created successfully'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Contact not created'
        ];
        echo json_encode($res);
        return false;
    }
}
?>
