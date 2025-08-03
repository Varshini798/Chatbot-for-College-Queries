<?php
session_start();
include("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the Composer autoloader
require 'vendor/autoload.php'; 

$message = ''; // Variable to hold success/error messages

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $stmt = $con->prepare("SELECT * FROM registeration WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50));
        $stmt = $con->prepare("UPDATE registeration SET reset_token = ?, token_expiration = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE Email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        
        $resetLink = "http://localhost/project/reset_password.php?token=" . $token; 
        $mail = new PHPMailer(true);
       
        try {
            $mail->isSMTP();                                         
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'sunnysuhas108@gmail.com';                
            $mail->Password   = 'mrln ufer tshv qqqf';                   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       
            $mail->Port       = 587;                                   

            $mail->setFrom('sunnysuhas108@gmail.com', 'Suhas');
            $mail->addAddress($email);                                 

            $mail->isHTML(true);                                     
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Click the link to reset your password: <a href='$resetLink'>$resetLink</a>";

            $mail->send();
            $message = "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                            <strong class='font-bold'>Success!</strong>
                            <span class='block sm:inline'>A password reset link has been sent to your email.</span>
                        </div>";
        } catch (Exception $e) {
            $message = "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                            <strong class='font-bold'>Error!</strong>
                            <span class='block sm:inline'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</span>
                        </div>";
        }
    } else {
        $message = "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                        <strong class='font-bold'>Error!</strong>
                        <span class='block sm:inline'>Email not found.</span>
                    </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Forgot Password</title>
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
            <!-- Display the message above the form -->
            <?php if ($message): ?>
                <div class="mb-4">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Forgot Password</h2>
                <form class="mt-8 space-y-6" action="" method="post">
    <div>
        <label for="email" class="sr-only">Email</label>
        <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Email">
    </div>
    <div>
        <button type="submit" name="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Send Reset Link
        </button>
    </div>
</form>
            </div>
        </div>
    </div>
</body>
</html>