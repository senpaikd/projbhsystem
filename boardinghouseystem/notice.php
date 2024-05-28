<?php
// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM applications WHERE status = 'pending'");

if ($result->num_rows > 0) {
    echo "<h2>Pending Applications</h2>";
    echo "<table border='1'>";
    echo "<tr><th>House Name</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['houseName']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['message']}</td>";
        echo "<td>
            <form action='manage_application.php' method='POST' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <button type='submit' name='action' value='accept'>Accept</button>
                <button type='submit' name='action' value='decline'>Decline</button>
            </form>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No pending applications.";
}

$conn->close();
?>
