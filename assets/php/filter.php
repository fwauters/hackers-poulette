<?php
    $errors = array();
    if (isset($_POST['button']) == true) {
        //----- Firstname
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        $firstname = trim($firstname);
        if ($firstname == "") {
            $errors['firstname'] = " - Please enter your firstname";
        }
        //----- Lastname
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $lastname = trim($lastname);
        if ($lastname == "") {
            $errors['lastname'] = " - Please enter your lastname";
        }
        //----- Gender
        $gender = $_POST['gender'];
        if ($gender == "") {
            $errors['gender'] = " - Please select a gender";
        }
        //----- Email
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors['email'] = " - This email address is invalid.";
        }
        //----- Country
        $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
        $country = trim($country);
        if ($country == "") {
            $errors['country'] = " - Please enter your country";
        }
        //----- Message
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        $message = trim($message);
        if ($message == "") {
            $errors['message'] = " - Please complete your message";
        }
    } 
?>