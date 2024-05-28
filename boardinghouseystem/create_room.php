<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST['room_number'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO rooms (room_number, capacity, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $room_number, $capacity, $status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New room added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
