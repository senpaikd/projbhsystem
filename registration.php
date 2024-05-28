<?php
require('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username already exists
    $query = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='form'>
                <h3>Username already exists. Please choose a different username.</h3><br/>
                <p class='link'>Click here to <a href='registration.php'>Register</a> again.</p>
              </div>";
    } else {
        // Hash the password using bcrypt
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $insert_query = "INSERT INTO `users` (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($conn, $insert_query)) {
            echo "<div class='form'>
                    <h3>Registration successful. You can now <a href='login.php'>log in</a>.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                    <h3>An error occurred. Please try again later.</h3><br/>
                  </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .registration-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .registration-button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }

        .registration-button:hover {
            background-color: #0056b3;
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="form-container">
            <form class="form" method="POST" name="registration">
                <h1 class="registration-title">User Registration</h1>
                <input type="text" class="registration-input" name="username" placeholder="Username" autofocus="true" required/>
                <input type="password" class="registration-input" name="password" placeholder="Password" required/>
                <input type="submit" value="Register" name="submit" class="registration-button"/>
                <p class="link">Already have an account? <a href="login.php">Log in here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
