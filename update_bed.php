<?php
// Include the database configuration file
require_once 'config.php';

// Check if bed ID is provided
if(isset($_POST['bed_id'])) {
    $bed_id = $_POST['bed_id'];

    // Fetch bed details from the database
    $sql = "SELECT * FROM beds WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bed_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Check if bed exists
    if($row) {
        // Display form with pre-filled bed details
        echo "
        <form method='post' action='update_bed.php'>
            <input type='hidden' name='bed_id' value='". $row['id'] ."'>
            <label for='bed_number'>Bed Number:</label>
            <input type='text' id='bed_number' name='bed_number' value='". $row['bed_number'] ."' required>
            <label for='room_id'>Room ID:</label>
            <input type='text' id='room_id' name='room_id' value='". $row['room_id'] ."' required>
            <label for='status'>Status:</label>
            <input type='text' id='status' name='status' value='". $row['status'] ."' required>
            <input type='submit' name='update' value='Update'>
        </form>
        ";
    } else {
        echo "Bed not found.";
    }
} else {
    echo "Bed ID not provided.";
}
?>
