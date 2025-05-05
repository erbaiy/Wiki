<?php
// include('includes/connection.php');
// $register=new Register();


// if(isset($_POST['submit']))
// {

//   $password_hash=password_hash($_POST["password"],PASSWORD_DEFAULT);
// $rs=$register->registration($_POST['username'],$_POST["email"],$password_hash);

// print_r($rs);
//  die();

// }







?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link rel="stylesheet" href="assets/styles/registerstyle.css">
</head>
<style>
    .error-msg {
        display: none;
        color: red;
        margin: 0 0 10px 10px;
    }

    .error-email {
        display: none;
        color: red;
        margin: 0 0 10px 10px;
    }

    .error-password {
        display: none;
        color: red;
        margin: 0 0 10px 10px;
    }
</style>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="#" method='POST'>
            <div class="input-box">
                <input id='user_name' type="text" placeholder="Enter your name" name="user_name" required>
                <p class="error-msg">invalid username</p>

            </div>
            <div class="input-box">
                <input id='email' type="text" placeholder="Enter your email" name='email' required>
                <p class="error-email">invalid email</p>
            </div>
            <div class="input-box">
                <input id='password' type="password" placeholder="Create password" name='password' required>
                <p class="error-password">invalid password!</p>
            </div>

            <div class="policy">
                <input type="checkbox">
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" name="submit" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="?route=login">Login now</a></h3>
            </div>
        </form>
    </div>
    <script>
        let userinp = document.getElementById('user_name');
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        let username_regex = /^[A-Za-z0-9_-]{6,20}\S*$/;
        let email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        userinp.addEventListener('input', function(e) {
            const isvalid = username_regex.test(e.target.value);
            if (isvalid) {
                console.log('valid username');
                document.getElementsByClassName("error-msg")[0].style.display = "none";
            } else {
                console.log('invalid username');
                document.getElementsByClassName("error-msg")[0].style.display = "block";
            }
        });
        email.addEventListener('input', function(e) {
            const isvalid = email_regex.test(e.target.value);
            if (isvalid) {
                console.log('valid email');
                document.getElementsByClassName("error-msg")[0].style.display = "none";
            } else {
                console.log('invalid email');
                document.getElementsByClassName("error-msg")[0].style.display = "block";
            }
        });
        password.addEventListener('input', function(e) {
            const isvalid = password_regex.test(e.target.value);
            if (isvalid) {
                console.log('valid passsword');
                document.getElementsByClassName("error-msg")[0].style.display = "none";
            } else {
                console.log('invalid password');
                document.getElementsByClassName("error-msg")[0].style.display = "block";
            }
        });
    </script>
</body>

</html>