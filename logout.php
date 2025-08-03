<?php
session_start();
session_destroy(); // Destroy the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // Clear session storage
        sessionStorage.clear();
        // Redirect to login page
        window.location.href = 'login.php';
    </script>
</head>
<body>
</body>
</html>