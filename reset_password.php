<?php
session_start();
include("config.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid and not expired
    $stmt = $con->prepare("SELECT * FROM registeration WHERE reset_token = ? AND token_expiration > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        die("Invalid or expired token.");
    }

    if (isset($_POST['submit'])) {
        $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // Update the password in the database
        $stmt = $con->prepare("UPDATE registeration SET Password = ?, reset_token = NULL, token_expiration = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $newPassword, $token);
        $stmt->execute();
        
        echo "<div class='bg-green-200 border border-green-400 text-green-800 px-4 py-3 rounded relative mb-4' role='alert'>
                <strong class='font-bold'>Success!</strong>
                <span class='block sm:inline'>Your password has been reset successfully.</span>
              </div>";
    }
} else {
    die("No token provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('bg.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333; 
        }
        .container {
            min-height: 100vh; 
        }
    </style>
</head>
<body>
    <div class="container flex items-center justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Reset Password</h2>
                <form class="mt-8 space-y-6" action="" method="post">
                    <div>
                        <label for="password" class="sr-only">New Password</label>
                        <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="New Password">
                    </div>
                    <div>
                        <label for="confirm-password" class="sr-only">Confirm Password</label>
                        <input id="confirm-password" name="confirm-password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Confirm Password">
                    </div>
                    <div>
                        <button type="submit" name="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>