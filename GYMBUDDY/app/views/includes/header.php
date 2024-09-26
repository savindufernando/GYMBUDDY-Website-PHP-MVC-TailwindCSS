<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($data['page_title']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .hover\:text-bittersweet:hover {
            color: #FF6F61;
        }
    </style>
</head>
<body class="bg-white">

<!-- Header -->
<header class="bg-white fixed top-0 left-0 w-full shadow-md z-40">
    <div class="container mx-auto flex justify-between items-center p-5">
        <!-- Logo -->
        <a href="/SSP-GYMBUDDY/public/index.php">
            <img src="/GYMBUDDY/public/images/logo2.png" width="160" height="50" alt="GymBuddy logo" loading="lazy">
        </a>

        <!-- Centered Navigation (Desktop Only) -->
        <nav class="hidden md:flex flex-grow justify-center items-center space-x-6">
            <ul class="flex space-x-6 text-black">
                <li><a href="index" class="hover:text-bittersweet">Home</a></li>
                <li><a href="about" class="hover:text-bittersweet">About</a></li>
                <li><a href="glutamin" class="hover:text-bittersweet">Products</a></li>
                <li><a href="cview1" class="hover:text-bittersweet">Services</a></li>
                <li><a href="contact" class="hover:text-bittersweet">Contact</a></li>
            </ul>
        </nav>

   <!-- Right Aligned Navigation (Desktop Only) -->
        <ul class="hidden md:flex items-center space-x-6 ml-auto text-gray-800">
                <!-- User Dropdown -->
            <li class="relative group">
                <button id="dropdown-button" class="flex items-center text-gray-800 hover:text-red-500 transition duration-200 focus:outline-none" aria-expanded="false">
                    <ion-icon name="person-circle-outline" class="text-2xl"></ion-icon>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdown-menu" class="absolute right-0 hidden group-hover:block w-56 mt-2 bg-white rounded-lg shadow-lg ring-1 ring-gray-300 z-20">
                    <div class="py-3 px-4 border-b border-gray-200">
                        <?php if (isset($_SESSION['name'])): ?>
                            <span class="block text-sm font-medium text-gray-700">Welcome,</span>
                            <span class="block text-lg font-bold text-blue-900"><?= htmlspecialchars($_SESSION['name']); ?></span>
                        <?php else: ?>
                            <span class="block text-sm font-medium text-gray-700">Welcome, Guest</span>
                        <?php endif; ?>
                    </div>
                    <div class="py-2">
                        <a href="login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">Login</a>
                        <a href="register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">SignUp</a>
                        
                    </div>
                    <div class="py-2">
                        <a href="profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">Your Profile</a>
                        <a href="orders" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">Your Orders</a>
                        <a href="wishlist" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">Wishlist</a>

                        <a href="logout" class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-50 transition-colors duration-150">Logout</a>
                    </div>
                </div>
            </li>

            <!-- Wishlist Icon -->
            <li class="relative">
                <button class="flex items-center text-gray-800 hover:text-red-500 transition duration-200" aria-label="Wishlist">
                    <ion-icon name="heart-outline" class="text-2xl"></ion-icon>
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">5</span>
                </button>
            </li>

            <!-- Cart Icon -->
            <li class="relative">
                <a href="cart" class="flex items-center text-gray-800 hover:text-red-500 transition duration-200" aria-label="Cart">
                    <ion-icon name="bag-outline" class="text-2xl"></ion-icon>
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">4</span>
                </a>
            </li>
        </ul>


        <!-- Mobile Menu Button -->
        <button id="menuButton" class="text-3xl md:hidden" aria-label="Open menu">
            <ion-icon name="menu-outline"></ion-icon>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <nav id="menu" class="fixed inset-0 bg-white z-30 transform translate-x-full transition-transform duration-300 ease-in-out md:hidden">
        <div class="p-5">
            <button id="closeButton" class="text-3xl text-black float-right" aria-label="Close menu">
                <ion-icon name="close-outline"></ion-icon>
            </button>
            <ul class="flex flex-col items-start space-y-6 text-black mt-8">
                <li><a href="index.php" class="hover:text-bittersweet text-lg font-medium">Home</a></li>
                <li><a href="/GYMBUDDY/app/view/user/about.php" class="hover:text-bittersweet text-lg font-medium">About</a></li>
                <li><a href="products.php" class="hover:text-bittersweet text-lg font-medium">Products</a></li>
                <li><a href="services.php" class="hover:text-bittersweet text-lg font-medium">Services</a></li>
                <li><a href="/GYMBUDDY/app/view/user/contactus.php" class="hover:text-bittersweet text-lg font-medium">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

</body>
</html>
