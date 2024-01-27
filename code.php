<?php
    require 'dbcon.php';
    if(isset($_POST['save_contact']))
    {
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $message = mysqli_real_escape_string($con, $_POST['message']);

        if($firstName == NULL || $lastName == NULL || $email == NULL || $phone == NULL || $message == NULL)
        {
            $res =[
                'status' => 422,
                'message' => 'All fields are mandatory'
            ];
            echo json_encode($res);
            return false;
        }

        $query = "INSERT INTO contacts (firstName, lastName, email, phone, message) VALUES ('$firstName', '$lastName', '$email', '$phone', '$message')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            $res =[
                'status' => 200,
                'message' => 'contact created successfully'
            ];
            echo json_encode($res);
            return false;
        } else{
            $res =[
                'status' => 500,
                'message' => 'contact not created'
            ];
            echo json_encode($res);
            return false;
        }
    }
?>