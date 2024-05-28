<?php
// Include the database configuration file
require_once 'config.php';

// Check if bed ID is provided
if(isset($_POST['bed_id'])) {
    $bed_id = $_POST['bed_id'];

    // Delete bed record from the database
    $sql = "DELETE FROM beds WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bed_id);

    // Execute the deletion query
    if($stmt->execute()) {
        echo "Bed deleted successfully.";
    } else {
        echo "Error deleting bed.";
    }
} else {
    echo "Bed ID not provided.";
}
?>
