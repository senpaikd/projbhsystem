<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bed Management</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            padding-top: 50px;
        }

        .nav {
            padding: 0 20px;
        }

        .nav-option {
            margin-bottom: 20px;
        }

        .nav-option a {
            color: #fff;
            text-decoration: none;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            margin: 150px;
            padding: 10px;            
            margin-left: 300px;
        }

        .card-header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            margin: 10px;
            border-radius: 5px 5px 0 0;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
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
            <img src="/images/icons8.png" alt="Logo" width="50" height="50">
            <div class="dropdown-content">
                <a href="registration.php">Sign Up</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </header>
    <div class="sidebar">
        <nav class="nav">
            <div class="option2 nav-option">
                <img src="/images/1000_F_304314755_vumdJmJ1JdkEeFjzix8tahXoHZdqqN3c.jpg" class="nav-img" alt="images">
                <a href="roommanagement.php"><h3>Room Management</h3></a>
            </div>
            <div class="nav-option option3">
                <img src="/images/bed.png" class="nav-img" alt="report">
                <a href="bedmanagement.php"><h3>Bed Management</h3></a>
            </div>
            <div class="nav-option option5">
                <img src="/images/user-icon-vector.jpg" class="nav-img" alt="blog">
                <a href="tenantsmanagement.php"><h3>Users Management</h3></a>
            </div>
        </nav>
    </div>
    <div class="card">
        <h5 class="card-header" style="margin-left: 0%;">Beds</h5>
        <button onclick="location.href='create_bed.php';" style="margin: 10px;">Add Bed</button>
        <div class="table-responsive text-nowrap">
            <table>
                <thead>
                    <tr>
                        <th>Tenant</th>
                        <th>Bed Number</th>
                        <th>Room Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';

                    $sql = "SELECT beds.*, rooms.room_number 
                            FROM beds 
                            INNER JOIN rooms ON beds.room_id = rooms.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['bed_number'] . "</td>";
                            echo "<td>" . $row['room_number'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td><input type='text' name='tenant_name[]' placeholder='Tenant Name' value='" . $row['tenant_name'] . "'></td>";
                            echo "<td>
                                    <form method='post' action='edit_bed.php'>
                                        <input type='hidden' name='bed_id' value='" . $row['id'] . "'>
                                        <button type='submit'>Edit</button>
                                    </form>
                                    <form method='post' action='delete_bed.php' onsubmit='return confirm(\"Are you sure you want to delete this bed?\")'>
                                        <input type='hidden' name='bed_id' value='" . $row['id'] . "'>
                                        <button type='submit'>Delete</button>
                                    </form>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No beds found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

