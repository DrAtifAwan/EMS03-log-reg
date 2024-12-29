<?php
// Include the database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = trim($_POST['att_name']);
    $email = trim($_POST['att_email']);
    $password = trim($_POST['att_password']);

    // Validate input
    if (empty($name) || empty($email) || empty($password)) {
        die("Error: All fields are required.");
    }

    // Check if the email is already registered
    $check_sql = "SELECT email FROM attendees WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    if ($check_stmt->num_rows > 0) {
        die("Error: Email is already registered. Please log in.");
    }
    $check_stmt->close();

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the attendee into the database
    $sql = "INSERT INTO attendees (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful! You can now log in.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
