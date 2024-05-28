<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'boarding_house');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $houseName = $_POST['houseName'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address =$_POST['address'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO applications (houseName, name, email, phone, address, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $houseName, $name, $email, $phone, $address, $message);

    if ($stmt->execute()) {
        echo "Application submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
