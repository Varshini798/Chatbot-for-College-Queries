<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AI Chatbot - Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        .dropdown-menu {
            display: none;
        }
        body {
            min-height: 100vh; 
            background-image: url('bg.jpg'); 
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat; 
            display: flex; 
            flex-direction: column; 
        }
        .content {
            flex: 1; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        #sidebar {
            position: fixed;
            top: 50px; 
            right: -300px; 
            width: 300px;
            background-color: white;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            transition: right 0.3s ease;
            z-index: 1000;
            padding: 20px;
            max-height: calc(100% - 50px); 
            overflow-y: auto; 
        }
        #sidebar.show {
            right: 0; 
        }
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none; 
            z-index: 999; 
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
                    <button id="profile-button" class="text-white bg-green-500 hover:bg-red-600 px-3 py-2 rounded-md text-base font-medium">Profile</button>
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

        <!-- Overlay for closing the sidebar -->
        <div id="overlay"></div>

        <div id="sidebar">
            <div class="p-4">
                <h2 class="text-xl font-bold">User  Profile</h2>
                <p><strong>Name:</strong> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?></p>
                <p><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'N/A'; ?></p>
                <p><strong>Username:</strong> <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'N/A'; ?></p>
                <a href="logout.php" class="mt-4 inline-block bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md">Logout</a>
            </div>
        </div>

        <div class="content">
            <div class="bg-pink-100 p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Admin Login</h2>
                <form id="login-form" class="mt-8 space-y-6">
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="admin-email" class="sr-only">Email address</label>
                            <input id="admin-email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                        </div>
                        <div>
                            <label for="admin-password" class="sr-only">Password</label>
                            <input id="admin-password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                        </div>
                        <div class="text-sm">
                            <a href="register.php" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot your password? </a>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Sign in
                        </button>
                    </div>
                    <div id="error-message" class="text-red-500 text-center hidden"></div>
                </form>
            </div>
        </div>

        <footer class="bg-blue-200 shadow-md mt-12">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Follow Us</h2>
                <div class="mt-4 flex justify-center space-x-6">
                    <a class="text-blue-500 hover:text-gray-700" href="https://www.facebook.com/jntuaceajp/">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a class="text-blue-500 hover:text-gray-700" href="https://twitter.com/ejntua">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a class="text-blue-500 hover:text-gray-700" href="https://www.instagram.com/jntua_official/?hl=en">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a class="text-blue-500 hover:text-gray-700" href="https://in.linkedin.com/company/jntua-cea">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                </div>
                <div class="mt-8 border-t border-black-200 pt-8 text-center text-blue-500">
                    © 2025 AI Chatbot. All rights reserved.
                </div>
            </div>
        </footer>
        <script>
            document.getElementById('menu-button').addEventListener('click', function() {
                var menu = document.getElementById('dropdown-menu');
                if (menu.style.display === 'none' || menu.style.display === '') {
                    menu.style.display = 'block';
                } else {
                    menu.style.display = 'none';
                }
            });

            document.getElementById('login-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting

                // Default credentials
                const defaultEmail = 'admin@gmail.com';
                const defaultPassword = '12345678';

                // Get the input values
                const email = document.getElementById('admin-email').value;
                const password = document.getElementById('admin-password').value;

                // Check credentials
                if (email === defaultEmail && password === defaultPassword) {
                    // Redirect to admin dashboard or perform any action
                    window.location.href = 'admininfo.php'; // Uncomment to redirect
                } else {
                    const errorMessage = document.getElementById('error-message');
                    errorMessage.textContent = 'Invalid email or password.';
                    errorMessage.classList.remove('hidden');
                }
            });

            // Sidebar toggle functionality
            document.getElementById('profile-button').addEventListener('click', function() {
                var sidebar = document.getElementById('sidebar');
                var overlay = document.getElementById('overlay');
                sidebar.classList.toggle('show');
                overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
            });

            overlay.addEventListener('click', function() {
                var sidebar = document.getElementById('sidebar');
                sidebar.classList.remove('show');
                overlay.style.display = 'none';
            });
        </script>
    </body>
</html>