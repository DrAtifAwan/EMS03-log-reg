<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($email) || empty($password)) {
        die("Error: Email and password are required.");
    }

    // Check if user exists
    $sql = "SELECT * FROM attendees WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error: Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Successful login
            session_start();
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Error: Invalid email or password.";
        }
    } else {
        echo "Error: No account found with this email.";
    }

    $stmt->close();
    $conn->close();
}
?>
