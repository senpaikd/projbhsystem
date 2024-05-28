<?php
require('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user data from the database
    $query = "SELECT user_id, username, password, role FROM `users` WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

            // Check user role
            if ($row['role'] == 'admin') {
                // Redirect admin to admin page
                header("Location: dashboard.php"); 
            } else {
                // Redirect regular user to user page
                header("Location: user_dashboard.php"); 
            }
            exit();
        } else {
            // Incorrect password
            $error_message = "Incorrect username or password.";
        }
    } else {
        // User not found
        $error_message = "Incorrect username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <style>
        .form {
            background: #fff;
            max-width: 300px;
            margin: 50px auto; /* Center the form vertically */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4caf50;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #45a049;
        }

        .link {
            text-align: center;
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
<?php if (isset($error_message)) : ?>
    <div class='form'>
        <h3><?php echo $error_message; ?></h3><br/>
        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
    </div>
<?php endif; ?>

<form class="form" method="POST" name="login">
    <h1 class="login-title">Login</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
    <input type="password" class="login-input" name="password" placeholder="Password"/>
    <input type="submit" value="Login" name="submit" class="login-button"/>
    <p class="link"><a href="registration.php">New Registration</a></p>
</form>

</body>
</html>
