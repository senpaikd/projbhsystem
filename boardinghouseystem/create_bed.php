<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bed_number = $_POST['bed_number'];
    $room_id = $_POST['room_id'];
    $status = $_POST['status'];
    $tenant_name = $_POST['tenant_name'];

    $sql = "INSERT INTO beds (bed_number, room_id, status, tenant_name) VALUES ('$bed_number', '$room_id', '$status', '$tenant_name')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bed</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>add Bed</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="bed_number">Bed Number:</label>
        <input type="text" id="bed_number" name="bed_number" required><br><br>
        <label for="room_id">Room ID:</label>
        <input type="text" id="room_id" name="room_id" required><br><br>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>
        <label for="tenant_name">Tenant Name:</label>
        <input type="text" id="tenant_name" name="tenant_name" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
