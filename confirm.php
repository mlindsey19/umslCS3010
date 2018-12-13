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
                <h1>Confirmation</h1>
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
                include 'DB_Func.php';
                $db = new DB_Func();
                $email = $_SESSION['email']; // does not allow duplicate emails
                $user = $db->isSuccessful($email);
                ?>

                <div id="confirmation">
                    <h1 id="confirm">CONFRMATION</h1>
                </div>
                <div class="confirmtext">
                    <br>
                    <p>Username: <?php echo $user['username']; ?> </p>
                    <p>Password: <?php echo $user['password'];  ?> </p>
                    <p>First Name:  <?php echo $user['firstName']; ?> </p>
                    <p>Last Name:  <?php echo $user['lastName']; ?> </p>
                    <p>Phone number:  <?php echo $user['phone']; ?> </p>
                    <p>Email:  <?php echo $user['email']; ?> </p>
                    <p>Address1:  <?php echo $user['address1']; ?> </p>
                    <p>Address2:  <?php echo $user['address2']; ?> </p>
                    <p>City:  <?php echo $user['city']; ?> </p>
                    <p>State:  <?php echo $user['state']; ?> </p>
                    <p>Zip Code:  <?php echo $user['zipCode']; ?> </p>
                    <p>Date of Birth:  <?php echo $user['dateOfBirth']; ?> </p>
                    <p>Gender:  <?php echo $user['gender']; ?> </p>
                    <p>Marital Status:  <?php echo $user['maritalStatus']; ?> </p>
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

