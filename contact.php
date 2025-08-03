<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AI Chatbot - Contact Us</title>
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
<body class="bg-gray-100">
    <nav class="bg-blue-100 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <button id="menu-button" aria-expanded="false" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
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

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Contact Us</h2>
            <div class="mt-8 bg-indigo-100 p-6 rounded-lg shadow-md">
                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-gray-800">Team Members</h3>
                    <p class="mt-2 text-gray-600">Suhas(TL)-23191A0508</p>
                    <p class="mt-2 text-gray-600">Mahitha-23191A0518</p>
                    <p class="mt-2 text-gray-600">Sai Varshini-23191A0528</p>
                    <p class="mt-2 text-gray-600">Naveen-23191A0538</p>
                    <p class="mt-2 text-gray-600">Yaswanth-23191A0548</p>
                    <p class="mt-2 text-gray-600">Sunil Kumar-23191A0558</p>
                    <h3 class="text-2xl font-bold text-gray-800">Contact Information</h3>
                    <p class="mt-2 text-gray-600">Phone: +91 7981778552</p>
                    <p class="mt-2 text-gray-600">Email: 8series@aichatbot.com</p>
                </div>
            </div>
        </div>

        <footer class="bg-blue-200 shadow-md mt-12">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Follow Us</h2>
                        <div class="mt-4 flex space-x-6">
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
                    </div>
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