<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['org_name'];
    $email = $_POST['org_email'];
    $password = password_hash($_POST['org_password'], PASSWORD_BCRYPT); // Hash password
    $organization = $_POST['organization'];

    // Insert query
    $sql = "INSERT INTO organizers (name, email, password, organization) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $password, $organization);

    if ($stmt->execute()) {
        echo "Organizer registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
