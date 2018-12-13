<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



    <style>
        h1{
            text-align: center;
        }
        .isNotValid{
            border-color: red;
        }
        .isValid{
            border-color: green;
        }
        .error{
            color: red;
        }

    </style>

</head>
<body  >

<form name="registerForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-12 float-right">
                <h1>Register</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 " style="background-color:lavenderblush;">

                <a href="register.php">Register</a>
                <br>
                <a href="home.html">Home</a>
                <br>
                <a href="disco.html">Animation</a>
            </div>

            <div class="col-sm-10 col-md-5" style="background-color:lavender;">
                <?php
                require_once 'form_check.php';
                ?>
                <!--username -->
                <div  class="form-group" >
                    <label for="username" class="mb-2 mr-sm-2">User Name:</label>
                    <input id="username" name="username" class="form-control mb-2 mr-sm-2" type="text"
                           placeholder="desiredUsername123" value="<?php echo $username ;?>"/>
                    <span id="usernameError" class="error"> <?php echo $usernameError; ?> </span>


                </div>

                <!--email-->
                <div  class="form-group">
                    <label for="email" class="mb-2 mr-sm-2">Email:</label>
                    <input id="email" name="email"  class="form-control mb-2 mr-sm-2"
                           placeholder="aa@bb.cc"value="<?php echo $email ;?>"/>
                    <span id="emailError" class="error"> <?php echo $emailError; ?> </span>

                </div>

                <!--password-->
                <div  class="form-group">
                    <label for="password" class="mb-2 mr-sm-2">Password:</label>
                    <input id="password" name="password" class="form-control mb-2 mr-sm-2" type="password"
                           placeholder="password" />
                    <span id="passwordError" class="error"> <?php echo $passwordError; ?> </span>

                </div>

                <!--password check-->
                <div  class="form-group">
                    <label for="passwordCheck" class="mb-2 mr-sm-2">Re-Enter Password:</label>
                    <input id="passwordCheck" name="passwordCheck" class=" form-control mb-2 mr-sm-2"
                           type="password" placeholder="password"/>
                    <span id="passwordCheck" class="error"> <?php echo $passwordCheckError; ?> </span>

                </div>


                <!--   First Name   -->
                <div  class="form-group">
                    <label for="firstName" class="mb-2 mr-sm-2">First Name:</label>
                    <input id="firstName" name="firstName" class="form-control mb-2 mr-sm-2" type="text"
                           placeholder="First Name" value="<?php echo $firstName ;?>"/>
                    <span id="firstNameError" class="error"> <?php echo $firstNameError; ?> </span>

                </div>


                <!--   Last Name   -->
                <div  class="form-group">
                    <label for="lastName" class="mb-2 mr-sm-2">Last Name:</label>
                    <input id="lastName" name="lastName" class="form-control mb-2 mr-sm-2" type="text"
                           placeholder="Last Name" value="<?php echo $lastName;?>"/>
                    <span id="lastNameError" class="error"> <?php echo $lastNameError; ?> </span>

                </div>


                <!--   date of birth   -->
                <div class="form-group">
                    <label for="dob"class="mb-2 rm-sm-2">Date of Birth</label>
                    <input id="dob" type="date" class="form-control" name="dob" min="1900-01-01" max="2018-12-31"
                    >
                    <span id="dobError" class="error"> <?php echo $dobError; ?> </span>

                </div>


                <!--gender-->
                <div class="form-group">
                    <label for="radioGender" class="mb-2 mr-sm-2">Gender:</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender">Male
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender">Female
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" >Other
                        </label>
                    </div>
                    <span id="genderError" class="error"> <?php echo $genderError; ?> </span><br>

                </div>


                <!--   marital status   -->
                <div class="form-group" >
                    <label for="radioMaritalStatus" class="mb-2 mr-sm-2">Marital Status:</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="maritalStatus">Married
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="maritalStatus">Single
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="maritalStatus">Divorced
                        </label>
                    </div>
                </div>
                <span id="mStatusError" class="error"> <?php echo $maritalStatusError; ?> </span><br>

            </div>

            <div class="col-sm-10 col-md-5" style="background-color: aqua;">

                <!--address line 1-->
                <div class="form-group">
                    <label for="address1" class="mb-2 mr-sm-2">Address Line 1:</label>
                    <input id="address1" name="address1" class="form-control mb-2 mr-sm-2" type="text"
                           placeholder="123 Address ave." value="<?php echo $address1;?>"/>
                    <span id="address1Error" class="error"> <?php echo $address1Error; ?> </span>

                </div>

                <!--address line 2-->
                <div class="form-group">
                    <label for="address2" class="mb-2 mr-sm-2">Address Line 2:</label>
                    <input id="address2" name="address2" class="form-control mb-2 mr-sm-2"
                           type="text" placeholder="apt. 2c" value="<?php echo $address2;?>"/>
                    <span id="address2Error" class="error"> <?php echo $address2Error; ?> </span>

                </div>

                <!--city-->
                <div class="form-group">
                    <label for="city" class="mb-2 mr-sm-2">City:</label>
                    <input id="city" name="city" class="form-control mb-2 mr-sm-2" type="input"
                           placeholder="St. Louis"  value="<?php echo $city;?>"/>
                    <span id="cityError"  class="error"> <?php echo $cityError; ?> </span>

                </div>

                <!--State-->
                <div class="form-group">
                    <label for="state" class=" mb-2 mr-sm-2">Select State:</label>
                    <select class="form-control mb-2 mr-sm-2" id="state" name="state">
                        <option value="">N/A</option>
                        <option value="AK">Alaska</option>
                        <option value="AL">Alabama</option>
                        <option value="AR">Arkansas</option>
                        <option value="AZ">Arizona</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DC">District of Columbia</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="IA">Iowa</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MD">Maryland</option>
                        <option value="ME">Maine</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MO">Missouri</option>
                        <option value="MS">Mississippi</option>
                        <option value="MT">Montana</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="NE">Nebraska</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NV">Nevada</option>
                        <option value="NY">New York</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VA">Virginia</option>
                        <option value="VT">Vermont</option>
                        <option value="WA">Washington</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WV">West Virginia</option>
                        <option value="WY">Wyoming</option>
                    </select>
                    <span id="stateError"  class="error"> <?php echo $stateError; ?> </span>

                </div>


                <!--Zip code-->
                <div class="form-group">
                    <label for="zipCode" class="mb-2 mr-sm-2">Zip Code:</label>
                    <input id="zipCode" name="zipCode" class="form-control mb-2 mr-sm-2"
                           placeholder="12345 or 12345-56789" value="<?php echo $zipCode ;?>"/>
                    <span id="zipCodeError" class="error"><?php echo $zipCodeError; ?> </span>
                </div>

                <!--phone number-->
                <div class="form-group ">
                    <label for="phoneNumber" class="mb-2 mr-sm-2">Phone Number:</label>
                    <input id="phoneNumber" name="phoneNumber" class=" form-control mb-2 mr-sm-2"
                           placeholder="123-456-1234" value="<?php echo $phoneNumber ;?>"/>
                    <span id="phoneNumberError" class="error"> <?php echo $phoneNumberError; ?> </span>

                </div>

                <!--   Submit btm   -->
                <div class="form-group">
                    <input id="submitBtn" type="submit" name="submit" value="Submit">
                </div>


                <!--   Reset btn   -->
                <div class="form-group">
                    <button class="mb-2 mr-sm-2" type="reset" value="Reset">Clear Form</button>
                </div>


            </div>

        </div>

    </div>
</form>
<hr>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
        <a href="https://soundcloud.com/griz" target="_blank">Soundcloud</a>
    </div>
    <div class="col-sm-3">
        <a href="http://www.mynameisgriz.com/" target="_blank">GRiZ</a>
    </div>
    <div class="col-sm-3">
        <a href="https://en.wikipedia.org/wiki/GRiZ" target="_blank">Wiki</a>
    </div>


</div>

</body>
</html>

