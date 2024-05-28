<?php
// Include the database configuration file
require_once 'config.php';

// Check if room ID is provided
if(isset($_POST['room_id'])) {
    $room_id = $_POST['room_id'];

    // Delete room record from the database
    $sql = "DELETE FROM rooms WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room_id);

    // Execute the deletion query
    if($stmt->execute()) {
        echo "Room deleted successfully.";
    } else {
        echo "Error deleting room.";
    }
} else {
    echo "Room ID not provided.";
}
?>
