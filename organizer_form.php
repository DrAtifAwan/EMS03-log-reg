<!DOCTYPE html>
<html lang="en">
<head>
    <title>Organizer Registration & Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Toggle password visibility for registration
        function toggleOrganizerPasswordVisibility() {
            const passwordField = document.getElementById("org-password");
            const toggleButton = document.getElementById("toggle-org-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show";
            }
        }

        // Toggle password visibility for login
        function toggleLoginPasswordVisibility() {
            const passwordField = document.getElementById("login-password");
            const toggleButton = document.getElementById("toggle-login-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show";
            }
        }

        // Toggle between registration and login forms
        function toggleForm() {
            const registrationContainer = document.getElementById("registration-container");
            const loginContainer = document.getElementById("login-container");
            registrationContainer.style.display = registrationContainer.style.display === "none" ? "block" : "none";
            loginContainer.style.display = loginContainer.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <!-- Organizer Registration Form -->
    <div class="container" id="registration-container">
        <h1>Register as Organizer</h1>
        <form action="register_organizer.php" method="post">
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="org_name" placeholder="Name" required>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="org_email" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
                <div class="input-group">
                    <input type="password" class="form-control" name="org_password" id="org-password" placeholder="Password" required>
                    <button type="button" class="btn btn-outline-secondary" id="toggle-org-password" onclick="toggleOrganizerPasswordVisibility()">Show</button>
                </div>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="organization" placeholder="Organization Name" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register as Organizer">
            </div>
        </form>
        <p>Already have an account? <a href="javascript:void(0)" onclick="toggleForm()">Login here</a>.</p>
    </div>

    <!-- Login Form -->
    <div class="container" id="login-container" style="display: none;">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="login-password" placeholder="Password" required>
                    <button type="button" class="btn btn-outline-secondary" id="toggle-login-password" onclick="toggleLoginPasswordVisibility()">Show</button>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
        <p>Don't have an account? <a href="javascript:void(0)" onclick="toggleForm()">Register here</a>.</p>
    </div>
</body>
</html>
