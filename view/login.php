<?php
// include('../app');
// $resl=new Login();
// if(isset($_POST["submit"]))
// {

//   $username = $_POST['username'];
//     $password =$_POST['password'];
//   $resl->login($username,$password);

// }






?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link rel="stylesheet" href="assets/styles/loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        .error-username {
            display: none;
            color: red;
            margin: -5px 0 10px 10px;
        }

        .error-password {
            display: none;
            color: red;
            margin: -5px 0 10px 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <h1></h1>
            <form action="?route=login" method="POST">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" id='username' name="user_name" placeholder="user name" required>
                    <p class="error-username">invalid username!</p>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <p class="error-password">invalid password!</p>
                </div>
                <div class="pass"><a href="#">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" name="submit" value="Login">
                </div>
                <span style="color:red;"></span>
                <div class="signup-link">Not a member? <a href="index.php?route=register">Signup now</a></div>
            </form>
        </div>
    </div>
    <script>
        let user_name = document.getElementById('username');
        let password = document.getElementById('password');

        let username_regex = /^[A-Za-z0-9_-]{6,20}\S*$/;
        let password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        user_name.addEventListener('input', function(e) {
            const isvalid = username_regex.test(e.target.value);
            if (isvalid) {
                console.log('valid username');
                document.getElementsByClassName("error-username")[0].style.display = "none";
            } else {
                console.log('invalid username');
                document.getElementsByClassName("error-username")[0].style.display = "flex";
            }
        });
        password.addEventListener('input', function(e) {
            let isvalid = password_regex.test(e.target.value);
            if (isvalid) {
                console.log('valid password');
                document.getElementsByClassName("error-password")[0].style.display = 'none';
            } else {
                console.log('invalid password');
                document.getElementsByClassName('error-password')[0].style.display = 'block';
            }
        })
    </script>

</body>

</html>