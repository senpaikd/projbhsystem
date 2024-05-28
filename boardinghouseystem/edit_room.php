<?php
// Include the database configuration file
require_once 'config.php';

// Check if room ID is provided
if(isset($_POST['room_id'])) {
    $room_id = $_POST['room_id'];

    // Fetch room details from the database
    $sql = "SELECT * FROM rooms WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Check if room exists
    if($row) {
        // Display form with pre-filled room details
        echo "
        <form method='post' action='update_room.php'>
            <input type='hidden' name='room_id' value='". $row['id'] ."'>
            <label for='room_number'>Room Number:</label>
            <input type='text' id='room_number' name='room_number' value='". $row['room_number'] ."' required>
            <label for='description'>Description:</label>
            <input type='text' id='description' name='description' value='". $row['description'] ."' required>
            <input type='submit' name='update' value='Update'>
        </form>
        ";
    } else {
        echo "Room not found.";
    }
} else {
    echo "Room ID not provided.";
}
?>
