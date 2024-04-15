<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="logosec">
            <div class="logo-img-container">
                <img src="advlogo.png" alt="Logo" class="logo-img">
            </div>
        </div>
        <div class="dropdown">
            <img src="icons8.png" alt="Logo" width="50" height="50">
            <div class="dropdown-content">
                <a href="register.php">Sign Up</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </header>
    <div class="sidebar">
        <nav class="nav">
            <div class="option2 nav-option">
                <img src="1000_F_304314755_vumdJmJ1JdkEeFjzix8tahXoHZdqqN3c.jpg" class="nav-img" alt="articles">
                <a href="roommanagement.php"><h3>Room Management</h3></a>
            </div>
            <div class="nav-option option3">
                <img src="bed.png" class="nav-img" alt="report">
                <a href="bedmanagement.php"><h3>Bed Management</h3></a>
            </div>
            <div class="nav-option option4">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
                    class="nav-img" alt="institution">
                <a href="payment.php"><h3>Payments</h3></a>
            </div>
            <div class="nav-option option5">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                    class="nav-img" alt="blog">
                <a href="usersmanagement.php"><h3>Users Management</h3></a>
            </div>
            <div class="nav-option option6">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                    class="nav-img" alt="settings">
                <a href="notice.php"><h3>Notice</h3></a>
            </div>
        </nav>
    </div>
    <div class="card">
        <h5 class="card-header">Tenants</h5>
           <div class="table-responsive text-nowrap">
               <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Room No.</th>
                            <th>Bed No.</th>
                        </tr>
                            </thead>
                            <tbody style="text-align: center;">
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                            </tbody>
                        </table>
                    </div>
                </div>
</body>
</html>