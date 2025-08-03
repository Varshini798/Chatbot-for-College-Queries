<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AI Chatbot - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        .dropdown-menu {
            display: none;
        }
        body {
            background-image: url('bg.jpg');
            background-size: cover;
            background-position: center;
            margin: 0; 
            height: 100vh; 
        }
        php, body {
          height: 100%; 
}

body {
    display: flex;
    flex-direction: column; 
}

.main-content {
    flex: 1; 
}
.message{
    text-align: center;
    background: green;
    padding: 10px 0px;
    border: 1px solid red;
    border-radius: 5px;
    margin-bottom: 5px;
    color: yellow;
}
    </style>
</head>
<body>
    <nav class="bg-blue-100 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <button id="menu-button" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                        <img alt="Logo" class="h-8 w-8 ml-4" height="50" src="https://th.bing.com/th/id/OIP.zwWv71MTy75P8z3KD6okZwHaFj?rs=1&pid=ImgDetMain" width="50"/>                        
                        <span class="ml-2 text-3xl font-bold text-gray-800">Chatbot</span>
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="home.php">Home</a>
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="category.php">Category</a>
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="about.php">About</a>
                        <a class="text-gray-500 hover:text-gray-700 inline-flex items-center px-5 pt-1 text-base font-medium" href="contact.php">Contact Us</a>
                    </div>
                </div>
                <div class="flex items-center">
                <?php 
                session_start();
                if (isset($_SESSION['valid'])): ?>
                    <a class="text-white bg-grren-500 hover:bg-red-600 px-3 py-2 rounded-md text-base font-medium" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="text-white bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-base font-medium" href="login.php">Login</a>
                    <a class="ml-4 text-white bg-blue-500 hover:bg-blue-600 px-3 py-2 rounded-md text-base font-medium" href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
        <div id="dropdown-menu" class="dropdown-menu absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
                <a href="home.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Home</a>
                <a href="category.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Categories</a>
                <a href="history.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">History</a>
                <a href="admin.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Admin</a>
                <a href="about.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">About</a>
                <a href="contact.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Contact Us</a>
            </div>
        </div>
    </nav>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-pink-100 p-8 rounded-lg shadow-lg w-full max-w-lg">

        <?php
include("config.php");

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Verifying the unique email
    $verify_query = mysqli_query($con, "SELECT Email FROM registeration WHERE Email='$email'");
    echo(mysqli_error($con));
    if (mysqli_num_rows($verify_query) != 0) {
        echo "<div class='message'>
                  <p>THIS email is used, Try another One Please!</p>
              </div> <br>";
        
        echo "<a href='javascript:self.history.back()'><button class='bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700'>Go back</button></a>";
    
    } else {
        
        $stmt = $con->prepare("INSERT INTO registeration (Name, Username, Email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Name, $username, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "<div class='message'>
                      <p>Registration Successful</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700'>Login Now</button></a>";
        } else {
            echo "<div class='message'>
                      <p>Error occurred: " . $stmt->error . "</p>
                  </div> <br>";
        }
        $stmt->close();
    }
} else {
?>
            <h2 class="text-2xl font-bold text-gray-800 text-center">Create Your Account</h2>
            <form class="mt-8 space-y-6" action="" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="Name" class="sr-only">Name</label>
                        <input id="Name" name="Name" type="text" autocomplete="Name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name">
                    </div>
                    <div>
                        <label for="username" class="sr-only">Username</label>
                        <input id="username" name="username" type="text" autocomplete="username" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username">
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>
                <div>
                    <button type="submit" name="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
                <div class="text-center text-sm text-gray-600">
                    Already have an account? <a href="login.php" class="font-medium text-indigo-600 hover:text-indigo-500">Login</a>
                </div>
            </form>
        </div>
        <?php 
} ?>
</div>

    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            var menu = document.getElementById('dropdown-menu');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }
        });
    </script>
</body>
    </html>