<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $application_id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'Accept') {
        $room_number = $_POST['room_number'];
        $bed_number = $_POST['bed_number'];

        // Fetch application details
        $sql = "SELECT * FROM applications WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $application_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $application = $result->fetch_assoc();
        
        if ($application) {
            // Insert into tenants
            $insert_sql = "INSERT INTO tenants (name, email, phone, address, room_number, bed_number) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("ssssss", $application['name'], $application['email'], $application['phone'], $application['address'], $room_number, $bed_number);
            $stmt->execute();

            // Update application status to 'accepted'
            $update_sql = "UPDATE applications SET status = 'accepted' WHERE id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("i", $application_id);
            $stmt->execute();

            header("Location: dashboard.php?msg=Application accepted and tenant added");
        } else {
            header("Location: dashboard.php?msg=Application not found");
        }
    } elseif ($action == 'Decline') {
        // Update application status to 'declined'
        $update_sql = "UPDATE applications SET status = 'declined' WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("i", $application_id);
        $stmt->execute();

        header("Location: dashboard.php?msg=Application declined");
    }
} else {
    header("Location: dashboard.php");
}
?>
