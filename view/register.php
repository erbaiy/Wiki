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

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="#" method='POST'>
            <div class="input-box">
                <input id='user_name' type="text" placeholder="Enter your name" name="user_name" required>
            </div>
            <div class="input-box">
                <input id='email' type="text" placeholder="Enter your email" name='email' required>
            </div>
            <div class="input-box">
                <input id='password' type="password" placeholder="Create password" name='password' required>
            </div>

            <div class="policy">
                <input type="checkbox">
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" name="submit" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="/login.php">Login now</a></h3>
            </div>
        </form>
    </div>
    <script>
        function formValidate() {
            let user_name = document.getElementById('user_name').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById(password).value;

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (user_name.trim() === '') {
                alert('Please enter a username');
                return false;
            }
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address');
                return false;
                return true;
            }

        }
    </script>
</body>

</html>