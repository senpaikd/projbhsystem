<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Navbar Styles */
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo-img {
            height: 40px;
            width: auto;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #cceeff;
        }

        .dropdown {
            position: relative;
        }

        .dropdown img {
            vertical-align: middle;
            margin-left: 20px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            padding: 10px;
            border-radius: 5px;
            right: 0;
            top: 100%;
        }

        .dropdown-content a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #f0f0f0;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Boarding Houses Section Styles */
        .boarding-houses {
            padding: 50px 0;
            text-align: center;
        }

        .house-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .house {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            background-color: #fff;
        }

        .house:hover {
            transform: translateY(-5px);
        }

        .house img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            border-radius: 10px 10px 0 0;
            cursor: pointer;
        }

        .house-details {
            padding: 15px;
            text-align: left;
        }

        .house-details h3 {
            margin: 0;
            font-size: 1.2em;
        }

        .house-details p {
            margin: 10px 0;
            color: #666;
        }

        .apply-btn {
            display: block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 0 0 10px 10px;
            transition: background-color 0.3s ease;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
        }

        .apply-btn:hover {
            background-color: #0056b3;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            position: relative;
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 700px;
            background-color: #fff;
            border-radius: 10px;
        }

        .modal-content img {
            width: 100%;
            height: auto;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 25px;
            color: #000;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }

        /* Tenant Form Styles */
        .tenant-form {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
        }

        .form-content {
            position: relative;
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 500px;
            background-color: #fff;
            border-radius: 10px;
        }

        .form-content form {
            display: flex;
            flex-direction: column;
        }

        .form-content form label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-content form input[type="text"],
        .form-content form input[type="email"],
        .form-content form input[type="tel"],
        .form-content form textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-content form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-content form button:hover {
            background-color: #0056b3;
        }

        .form-close {
            position: absolute;
            top: 10px;
            right: 25px;
            color: #000;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-close:hover,
        .form-close:focus {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Navbar Section -->
<header>
    <div class="container">
        <div class="logo">
            <a href="user_dashboard.php"><img src="images/advlogo.png" alt="Logo" class="logo-img"></a>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="dropdown">
            <img src="images/icons8.png" alt="Menu Icon" width="30" height="30">
            <div class="dropdown-content">
                <a href="register.php">Sign Up</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
</header>

<!-- Available Boarding Houses Section -->
<section class="boarding-houses">
    <div class="container">
        <h2>Available Boarding Houses</h2>
        <div class="house-gallery">
            <div class="house">
                <img src="images/47.jpg" alt="House 1" class="house-img" onclick="openModal('modal1')">
                <div class="house-details">
                    <h3>A.D.V BH 1</h3>
                    <p>Price: P900/month</p>
                    <p>Located at San Ramon Bontoc</p>
                </div>
                <button class="apply-btn" onclick="openForm('A.D.V BH 1')">Apply Now</button>
            </div>
            <div class="house">
                <img src="images/house2.jpg" alt="House 2" class="house-img" onclick="openModal('modal2')">
                <div class="house-details">
                    <h3>A.D.V BH 2</h3>
                    <p>Price: P1200/month</p>
                    <p>Located at San Ramon Bontoc</p>
                </div>
                <button class="apply-btn" onclick="openForm('A.D.V BH 2')">Apply Now</button>
            </div>
            <!-- Add more houses as needed -->
        </div>
    </div>
</section>

<!-- House Details Modals -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal1')">&times;</span>
        <img src="images/comfortroom1.jpg" alt="House 1">
        <img src="images/room.jpg" alt="House 1 Interior">
    </div>
</div>

<div id="modal2" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal2')">&times;</span>
        <img src="images/comfortroom2.jpg" alt="House 2">
        <img src="images/room2.jpg" alt="House 2 Interior">
    </div>
</div>

<!-- Tenant Application Form Modal -->
<div id="tenantForm" class="tenant-form">
    <div class="form-content">
        <span class="form-close" onclick="closeForm()">&times;</span>
        <form id="applicationForm" action="submit_application.php" method="POST">
            <h2>Tenant Application Form</h2>
            <label for="houseName">House Name</label>
            <input type="text" id="houseName" name="houseName" readonly>

            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>


            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit Application</button>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    function openForm(houseName) {
        document.getElementById("houseName").value = houseName;
        document.getElementById("tenantForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("tenantForm").style.display = "none";
    }
</script>

</body>
</html>
