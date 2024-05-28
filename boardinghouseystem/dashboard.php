<?php
// Include the database configuration file
require('config.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch the user's role from the session or database
$username = $_SESSION['username'];
$sql = "SELECT role FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$role = $user['role'];

$stmt->close(); // Close the prepared statement

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
    /* Additional CSS for action content */
    .action-form {
        display: flex;
        justify-content: center;
        gap: 10px;
        align-items: center;
    }

    .action-form label {
        width: auto;
        margin-right: 10px;
    }

    .action-form input[type="text"],
    .action-form input[type="submit"] {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .action-form input[type="text"] {
        width: 100px; /* Adjust width as needed */
    }

    .action-form input[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .action-form input[type="submit"]:hover {
        background-color: #555;
    }
</style>
</head>
<body>
    <header>
        <div class="logosec">
            <div class="logo-img-container">
                <a href="dashboard.php"><img src="/images/advlogo.png" alt="Logo" class="logo-img"></a>
            </div>
        </div>
        <div class="dropdown">
            <img src="/images/icons8.png" alt="Menu Icon" width="50" height="50">
            <div class="dropdown-content">
                <a href="registration.php">Sign Up</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </header>

    <div class="sidebar">
        <nav class="nav">
            <div class="option2 nav-option">
                <img src="/images/1000_F_304314755_vumdJmJ1JdkEeFjzix8tahXoHZdqqN3c.jpg" class="nav-img" alt="Room Management">
                <a href="roommanagement.php"><h3>Room Management</h3></a>
            </div>
            <div class="nav-option option3">
                <img src="/images/bed.png" class="nav-img" alt="Bed Management">
                <a href="bedmanagement.php"><h3>Bed Management</h3></a>
            </div>
            <div class="nav-option option5">
                <img src="/images/user-icon-vector.jpg" class="nav-img" alt="Users Management">
                <a href="tenantsmanagement.php"><h3>Users Management</h3></a>
            </div>
        </nav>
    </div>

    <div class="content">
        <div class="main-container">
            <div class="main">
                <div class="card">
                <?php if ($role == 'admin') { ?>
                <div class="card">
                    <h5 class="card-header">Manage Applications</h5>
                    <div class="table-responsive text-nowrap">
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>House Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Application Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <?php
                                $sql = "SELECT * FROM applications WHERE status='pending'";
                                $result = $conn->query($sql); // Execute the query

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['houseName'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['address'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>" . htmlspecialchars($row['application_date'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td>
                                                <form method='post' action='manage_application.php'>
                                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "'>
                                                    <label for='room_number'>Room No.:</label>
                                                    <input type='text' id='room_number' name='room_number' required>
                                                    <label for='bed_number'>Bed No.:</label>
                                                    <input type='text' id='bed_number' name='bed_number' required>
                                                    <input type='submit' name='action' value='Accept'>
                                                    <input type='submit' name='action' value='Decline'>
                                                </form>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='9'>No pending applications</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
