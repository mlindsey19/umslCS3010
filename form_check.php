<?php

require_once 'DB_Func.php';
$db = new DB_Func();



$isFormValid = TRUE;

$usernameError = $passwordError = $passwordCheckError = $firstNameError = $lastNameError =
$address1Error = $address2Error = $cityError = $stateError  = $zipCodeError  = $phoneNumberError =
$emailError = $genderError = $maritalStatusError = $dobError =
$username =  $password = $passwordCheck = $firstName = $lastName = $address1 = $address2 =
$city = $state  = $zipCode = $phoneNumber = $email = $gender = $maritalStatus = $dob = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $db->test_input($_POST["username"]);
    $password = $db->test_input($_POST["password"]);
    $passwordCheck = $db->test_input($_POST["passwordCheck"]);
    $firstName = $db->test_input($_POST["firstName"]);
    $lastName = $db->test_input($_POST["lastName"]);
    $address1 = $db->test_input($_POST["address1"]);
    $address2 = $db->test_input($_POST["address2"]);
    $city = $db->test_input($_POST["city"]);
    $state = $db->test_input($_POST["state"]);
    $zipCode = $db->test_input($_POST["zipCode"]);
    $phoneNumber = $db->test_input($_POST["phoneNumber"]);
    $email = $db->test_input($_POST["email"]);
    $gender = $db->test_input($_POST["gender"]);
    $maritalStatus = $db->test_input($_POST["maritalStatus"]);
    $dob = $db->test_input($_POST["dob"]);

    $db->username();
    $db->password();
    $db->passwordCheck();
    $db->firstName();
    $db->lastName();
    $db->address1();
    $db->address2();
    $db->city();
    $db->state();
    $db->zipCode();
    $db->phoneNumber();
    $db->email();
    $db->gender();
    $db->maritalStatus();
    $db->dob();

    if (empty($state)) {
        $isFormValid = FALSE;
        $stateError = "State is required";
    }

    if($isFormValid == TRUE){
    global $user;
        $db->storeUser($username, $password, $firstName,
                $lastName, $address1, $address2, $city, $state, $zipCode, $phoneNumber, $email, $gender,
                $maritalStatus, $dob);
        session_start();
        $_SESSION = $_POST;
        session_write_close();
         header("Location: confirm.php");
    }
}