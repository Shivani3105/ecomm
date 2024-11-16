<?php
// This script will handle login
include('header.php');
require "dbconfig.php";
$username = $password = $firstname =$lastname="";
$err = "";

// If request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username and password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        $sql = "SELECT first_name,last_name, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        // Check if the statement was prepared successfully
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $firstname, $lastname, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // This means the password is correct. Allow user to login
                            session_start();
                            $_SESSION["firstname"] = $firstname;
                            $_SESSION["lastname"] = $lastname;
                            $_SESSION["loggedin"] = true;
                            // Redirect user to welcome page
                            header("location: index.php");
                            exit; // Ensure no further code is executed after the redirect
                        } else {
                            $err = "Invalid password.";
                        }
                    }
                } else {
                    $err = "No account found with that username.";
                }
            } else {
                $err = "Oops! Something went wrong. Please try again later.";
            }
            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            $err = "Could not prepare statement.";
        }
    }
}

// Close the connection
mysqli_close($conn);
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="projectstyles.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>ReForm - A foundation</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .forms {
            margin-top: 100px; /* Space from the top */
        }
        .form-content {
            background-color: #ffffff; /* White background for the form */
            padding: 30px; /* Padding inside the form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .headerr {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold; /* Bold header */
        }
        .input-field {
            margin-bottom: 15px;
            position: relative; /* Position relative for the icon */
        }
        .button-field {
            text-align: center;
        }
        .form-link {
            text-align: center; /* Center align the link */
            margin-top: 15px; /* Space above the link */
        }
        .btn-primary {
            width: 100%; /* Full width button */
        }
        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>

<section class="container forms">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-content">
                <div class="headerr">Login</div>
                <form action="" method="post">
                    <div class="field input-field">
                        <input type="text" name="username" placeholder="Username" class="input form-control" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" id="password" name="password" placeholder="Password" class="password form-control" required>
                        <!-- <i class='bx bx-hide eye-icon' id="togglePassword" onclick="togglePassword()"></i> -->
                    </div>

                    <div class="field button-field">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Don't have an account? <a href="register.php" class="link signup-link">Sign Up</a></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384