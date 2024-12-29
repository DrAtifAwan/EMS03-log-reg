<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Event Management System</h1>
        <div class="text-center toggle-btns">
            <button class="btn btn-primary" id="organizer-btn">Organizer</button>
            <button class="btn btn-primary" id="attendee-btn">Attendee</button>
        </div>

        <!-- Organizer Registration Form -->
        <div id="organizer-form" class="form-container">
            <?php include 'organizer_form.php'; ?>
        </div>

        <!-- Attendee Registration Form -->
        <div id="attendee-form" class="form-container" style="display: none;">
            <?php include 'attendee_form.php'; ?>
        </div>
    </div>

    <script>
        // Toggle visibility of forms
        document.getElementById('organizer-btn').addEventListener('click', function () {
            document.getElementById('organizer-form').style.display = 'block';
            document.getElementById('attendee-form').style.display = 'none';
        });

        document.getElementById('attendee-btn').addEventListener('click', function () {
            document.getElementById('organizer-form').style.display = 'none';
            document.getElementById('attendee-form').style.display = 'block';
        });
    </script>
</body>
</html>
