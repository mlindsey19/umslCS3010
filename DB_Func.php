<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class DB_Func
{
    private $conn;

    //constructor
    function __construct()
    {
        require_once 'DB_conn.php';
        $db = new DB_Connect();
        $this->conn = $db->connect();
    }

    function __destruct(){}


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function username(){
        global $username, $usernameError, $isFormValid;
        if(strlen($username) < 6 || strlen($username) > 50){
            $usernameError ='Username required. 6-50 characters.';
            $isFormValid = FALSE;

        }
    }
    function password(){
        global $password, $passwordError,$isFormValid;
        $regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,50}$^";
        if (strlen($password) < 8 || strlen($password) > 50 || !preg_match($regex, $password)
        ) {
            $isFormValid = FALSE;
            $passwordError = "Must contain at least 1 upper case, lower case, number and symbol. 8-50 Characters.";
        }
    }

    function passwordCheck(){
        global $password, $passwordCheck, $passwordCheckError,$isFormValid;
        if($password != $passwordCheck){
            $isFormValid = FALSE;
            $passwordCheckError = 'Passwords do not match';
        }

    }

    function firstName(){
        global $firstName, $firstNameError, $isFormValid;
        if(strlen($firstName) < 1 || strlen($firstName) > 50){
            $firstNameError ='First name required. 1-50 characters.';
            $isFormValid = FALSE;

        }
    }
    function lastName(){
        global $lastName, $lastNameError, $isFormValid;
        if(strlen($lastName) < 1 || strlen($lastName) > 50){
            $lastNameError ='Last name required. 1-50 characters.';
            $isFormValid = FALSE;

        }
    }

    function address1(){
        global $address1, $address1Error, $isFormValid;
        if(strlen($address1) < 1 || strlen($address1) > 100){
            $address1Error ='address required. 1-100 characters.';
            $isFormValid = FALSE;

        }
    }
    function address2(){
        global $address1, $address1Error, $isFormValid;
        if(strlen($address1) > 100){
            $address1Error ='100 characters max';
            $isFormValid = FALSE;

        }
    }

    function city(){
        global $city, $cityError, $isFormValid;
        if(strlen($city) > 50 || strlen($city ) < 1){
            $cityError = 'city required. 50 characters max.';
            $isFormValid = false;
        }
    }

    function state(){
        global $state, $stateError, $isFormValid;
        if(empty($state)){
            $isFormValid = false;
            $stateError ='State is requred.';
        }
    }

    function zipCode(){
        global $zipCode,$zipCodeError,$isFormValid;
        $regex = '^\d{5}(?:[-\s]\d{4})?$^';
        if (strlen($zipCode) != 5 && strlen($zipCode) != 9 && !preg_match($regex, $zipCode)
        ) {
            $isFormValid = FALSE;
            $zipCodeError = "Enter valid zip: xxxxx or xxxxx-xxxx";
        }
    }

    function phoneNumber(){
        global $phoneNumber, $phoneNumberError, $isFormValid;
        $regex = '^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$^';

        if (empty($phoneNumber) || !preg_match($regex, $phoneNumber)){
            $isFormValid = false;
            $phoneNumberError = 'Valid phone number required.';
        }
    }

    function email(){
        global $email, $emailError, $isFormValid;
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $isFormValid = FALSE;
            $emailError = "Email is required. Format must be x@x.x";
        }
        if ($this->isUserInfoUnique($email)){
            $isFormValid = FALSE;
            $emailError = "Email already exists";
        }
    }

    function gender(){
        global $gender, $genderError, $isFormValid;
        if (empty($gender)) {
            $isFormValid = FALSE;
            $genderError = "Gender is required";
        }
    }
    function maritalStatus(){
        global $maritalStatus, $maritalStatusError, $isFormValid;
        if (empty($maritalStatus)) {
            $isFormValid = FALSE;
            $maritalStatusError = "Status is required";
        }
    }

    function dob(){
        global $dob, $dobError, $isFormValid;
        if(empty($dob)){
            $isFormValid = FALSE;
            $dobError = "Date of birth required.";
        }
    }





    function storeUser($userName, $password, $firstName,
                       $lastName, $address1, $address2, $city, $state, $zipCode, $phone, $email, $gender,
                       $maritalStatus, $dateOfBirth)
    {
        //uniqueID, hash, salt
        $uniqueID = uniqid(' ', true);
        $hash = $this->hashSSHA($password);
        // add salt and encrypt pass
        $encryptedPassword = $hash["encrypted"];
        $salt = $hash["salt"];

//        $conn->prepare("INSERT INTO registration (userName, password, firstName,
//        lastName, address1, address2, city, state, zipCode, phone, email, gender,
//        maritalStatus, dateOfBirth)
        //prepare sql //ADD salt and encrypted password
        $stmt = $this->conn->prepare("INSERT INTO registration (userName, password, firstName,
        lastName, address1, address2, city, state, zipCode, phone, email, gender,
        maritalStatus, dateOfBirth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssss", $userName, $password, $firstName,
            $lastName, $address1, $address2, $city, $state, $zipCode, $phone, $email, $gender,
            $maritalStatus, $dateOfBirth);
        $result = $stmt->execute();
        $stmt->close();

        //check for successful store
        if ($result) {
            return $this->isSuccessful($email);
        } else {
            return false;
        }
    }


    //Encrypting password
    public function hashSSHA($password)
    {
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    public function checkHashSSHA($salt, $password)
    {
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        return $encrypted;
    }

    /**
     * @param $email
     * @return bool
     */
    public function isUserInfoUnique($email )
    {
        //check email
        $stmt = $this->conn->prepare("SELECT email from registration WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $stmt->store_result();
        $existingInfo = $stmt->num_rows();

        $stmt->close();
        return $existingInfo;
    }


    /**
     * @param $email
     * @return mixed
     */
    public function isSuccessful($email)
    {
        $id = $userName = $password = $firstName = $lastName = $address1 = $address2 = $city =
        $state = $zipCode = $phone  = $gender = $maritalStatus = $dateOfBirth = "";

        global $user;

        $stmt = $this->conn->prepare("SELECT * FROM registration WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id, $userName, $password, $firstName, $lastName, $address1, $address2, $city,
            $state, $zipCode, $phone, $email, $gender, $maritalStatus, $dateOfBirth);

        $stmt->fetch();

        //store in array $user
        $user['id'] = $id;
        $user['username'] = $userName;
        $user['password'] = $password;
        $user['firstName'] = $firstName;
        $user['lastName'] = $lastName;
        $user['address1'] = $address1;
        $user['address2'] = $address2;
        $user['city'] = $city;
        $user['state'] = $state;
        $user['zipCode'] = $zipCode;
        $user['phone'] = $phone;
        $user['email'] = $email;
        $user['gender'] = $gender;
        $user['maritalStatus'] = $maritalStatus;
        $user['dateOfBirth'] = $dateOfBirth;



        $stmt->close();

        return $user;
    }




}
