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
            $user_name = htmlspecialchars($_POST['user_name']);
            $email = htmlspecialchars($_POST['email']);
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
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location:?route=home');
        exit();
    }
    // public function login()
    // {
    //     $userModel = new Autontification();
    //     if (isset($_POST["submit"])) {
    //         $username = htmlspecialchars($_POST['user_name']);
    //         $username = filter_var($username, FILTER_SANITIZE_STRING);
    //         $password = $_POST['password'];
    //         $user = $userModel->login($username, $password);
    //         if ($user && password_verify($password, $user['password']) && $username == $user['username']) {
    //             $_SESSION['user_id'] = $user['user_id'];
    //             if ($user['role'] == 'admin') {
    //                 header('Location:?route=selectData');
    //             } elseif ($user['role'] == 'author') {
    //                 header('Location:?route=home');
    //             }
    //         } else {
    //             echo 'error';
    //             exit();
    //         }
    //     }
    // }
    public function login()
    {
        $userModel = new Autontification();

        if (isset($_POST["submit"])) {
            $username = htmlspecialchars($_POST['user_name'], ENT_QUOTES, 'UTF-8');
            $password = $_POST['password'];

            // Sanitize and validate user input
            $username = filter_var($username, FILTER_SANITIZE_STRING);
            // ... perform additional validation and sanitization for $password

            $user = $userModel->login($username, $password);

            if ($user && password_verify($password, $user['password']) && $username === $user['username']) {
                // Set session variables securely
                session_regenerate_id(true); // Regenerate session ID to prevent session fixation
                $_SESSION['user_id'] = $user['user_id'];

                if ($user['role'] === 'admin') {
                    header('Location: ?route=selectData');
                    exit();
                } elseif ($user['role'] === 'author') {
                    header('Location: ?route=home');
                    exit();
                }
            } else {
                dump($username);
                // Delay response for failed login attempts to mitigate brute force attacks
                usleep(500000); // Sleep for 500ms
                // Display a generic error message
                echo 'Invalid username or password.';
                exit();
            }
        }
    }
}
