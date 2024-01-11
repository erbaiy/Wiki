<?php


namespace App\Controllers;


use Symfony\Component\VarDumper\VarDumper;

use App\Models\Autontification;
use FTP\Connection;

class AutontificationController
{
    // public function register()
    // {
    //     if (isset($_POST['submit'])) {
    //         $user_name = $_POST['user_name'];
    //         // VarDumper::dump($user_name);
    //         // die();
    //         $email = $_POST['email'];
    //         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //         $result = new Autontification();
    //         $result->register($user_name, $email, $password);
    //     }
    // }
    public function register()
    {
        if (isset($_POST['submit'])) {
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $validationErrors = [];

            // Validate user_name field
            if (empty($user_name)) {
                $validationErrors[] = "Username is required.";
            }

            // Validate email field
            if (empty($email)) {
                $validationErrors[] = "Email is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validationErrors[] = "Invalid email format.";
            }

            // Validate password field
            if (empty($password)) {
                $validationErrors[] = "Password is required.";
            } elseif (strlen($password) < 6) {
                $validationErrors[] = "Password must be at least 6 characters long.";
            }

            if (empty($validationErrors)) {
                // All fields are valid, proceed with registration
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $result = new Autontification();
                $result->register($user_name, $email, $hashedPassword);
            } else {
                // Display validation errors to the user
                foreach ($validationErrors as $error) {
                    echo $error . "<br>";
                }
            }
        }
    }
    public function getlogin()
    {
        require('../view/login.php');
    }
    public function login()
    {
        $userModel = new Autontification();

        if (isset($_POST["submit"])) {
            $username = $_POST['user_name'];
            $password = $_POST['password'];

            $user = $userModel->login($username, $password);


            if ($user && password_verify($password, $user['password']) && $username == $user['username']) {
                $_SESSION = $user['user_id'];
                // VarDumper::dump($_SESSION);
                // die();
                if ($user['role'] == 'admin') {
                    require('../view/admin/home.php');
                } elseif ($user['role'] == 'author') {
                    echo 'author';
                }
            } else {
                echo 'error';
                exit();
            }
        }
    }
}
