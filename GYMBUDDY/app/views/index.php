<?php $this->view("includes/header",$data);?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Gym Buddy</title>

    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    
    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="/SSP/public/output.css">
    
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <main>
        <article>
            <!-- Hero Section -->
            <section>
                <div class="relative">
                    <div class="absolute inset-0 flex items-center justify-start p-10">
                        <a href="SSP/public/" class="bg-red-400 text-white px-4 py-2 rounded-full font-semibold hover:bg-red-500 transition">About us →</a>
                    </div>
                    <img src="/SSP/public/images/gym-home.jpg" alt="Fitness Image" class="object-cover w-full h-full lg:w-720">
                </div>
            </section>
            <section>
            <h1 id="text-gray-800 text-lg font-semibold">Welcome, <?php if(isset($_SESSION['usersId'])){
                echo explode(" ", $_SESSION['usersEmail'])[0];
            }else{
                echo 'Guest';
            }?> 
            </h1>
            </section>
            
            <!-- Collections Section -->
            <section class="py-12">
                <div class="container mx-auto flex justify-center gap-8">
                    <!-- Personal Training -->
                    <div class="bg-cover bg-center h-[350px] w-[300px] flex flex-col justify-between items-center p-8 bg-no-repeat" style="background-image: url('/SSP/public/images/personal-training1.png')">
                        <h3 class="text-gray-800 text-lg font-semibold">PERSONAL TRAINING</h3>
                        <a href="services.html" class="flex items-center gap-2 px-6 py-3 bg-red-400 text-white text-sm font-semibold rounded hover:bg-red-500 transition">
                            <span>Explore All</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>

                    <!-- Supplement Collections -->
                    <div class="bg-cover bg-center h-[350px] w-[300px] flex flex-col justify-between items-center p-8 bg-no-repeat" style="background-image: url('/SSP/public/images/supplements.png')">
                        <h3 class="text-gray-800 text-lg font-semibold">SUPPLEMENT COLLECTIONS</h3>
                        <a href="products.html" class="flex items-center gap-2 px-6 py-3 bg-red-400 text-white text-sm font-semibold rounded hover:bg-red-500 transition">
                            <span>Explore All</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </section>
            <!-- Bestselling Personal Training Packages Section -->
            <section class="py-12 px-10">
                <div class="container mx-auto">
                    <h2 class="text-4xl font-bold text-center mb-8">Bestselling Personal Training Packages</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Service Card 1 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/price1.jpg" alt="Calisthenics Workout Session" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-red-400 text-white px-3 py-1 rounded-full">Best</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <div class="text-gray-500 text-sm text-center">Men / Women (Monthly)</div>
                                <h3 class="text-xl font-semibold mt-2 text-center">Calisthenics Workout Session</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$20.00</div>
                            </div>
                        </div>

                        <!-- Service Card 2 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/price3.jpg" alt="Weight Gaining Workout Plan" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-red-400 text-white px-3 py-1 rounded-full">Best</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <div class="text-gray-500 text-sm text-center">Men / Women (Monthly)</div>
                                <h3 class="text-xl font-semibold mt-2 text-center">Weight Gaining Workout Plan</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$20.00</div>
                            </div>
                        </div>

                        <!-- Service Card 3 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/price4.jpg" alt="Weight losing Workout Plan" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-red-400 text-white px-3 py-1 rounded-full">Best</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <div class="text-gray-500 text-sm text-center">Men / Women (Monthly)</div>
                                <h3 class="text-xl font-semibold mt-2 text-center">Weight losing Workout Plan</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$20.00</div>
                            </div>
                        </div>

                        <!-- Service Card 4 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/price2.png" alt="Tournament Body Building Plan" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-orange-400 text-white px-3 py-1 rounded-full">New</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <div class="text-gray-500 text-sm text-center">Men / Women (Monthly)</div>
                                <h3 class="text-xl font-semibold mt-2 text-center">Tournament Body Building Plan</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$20.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Bestselling Supplements Section -->
            <section class="py-12 px-10">
                <div class="container mx-auto">
                    <h2 class="text-4xl font-bold text-center mb-8">Bestselling Supplements</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Product Card 1 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/Hyper-Gain-6-lbs-New-400x400.jpg" alt="Hyper-Gain-6-lbs-New-400x400" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-red-400 text-white px-3 py-1 rounded-full">Best</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <h3 class="text-xl font-semibold mt-2 text-center">Hyper Gain 6lbs</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$50.00</div>
                            </div>
                        </div>

                        <!-- Product Card 2 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/Muscletech-Masstech-Extreme-2000-6-lbs-400x400.jpg" alt="Muscletech-Masstech-Extreme-2000-6-lbs-400x400" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-red-400 text-white px-3 py-1 rounded-full">Best</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <h3 class="text-xl font-semibold mt-2 text-center">Muscletech Masstech Extreme 2000 6lbs</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$60.00</div>
                            </div>
                        </div>

                        <!-- Product Card 3 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/Muscletech-Platinum-Collagen-700g-400x400.jpg" alt="Muscletech-Platinum-Collagen-700g-400x400" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-red-400 text-white px-3 py-1 rounded-full">Best</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <h3 class="text-xl font-semibold mt-2 text-center">Muscletech Platinum Collagen 700g</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$25.00</div>
                            </div>
                        </div>

                        <!-- Product Card 4 -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group">
                            <figure class="relative">
                                <img src="/SSP/public/images/Muscletech-Platinum-Multi-90-NEW-400x400.jpg" alt="Muscletech-Platinum-Multi-90-NEW-400x400" class="w-full h-64 object-cover">
                                <div class="absolute top-3 left-3 bg-orange-400 text-white px-3 py-1 rounded-full">New</div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                        <button class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <h3 class="text-xl font-semibold mt-2 text-center">Muscletech Platinum Multi 90</h3>
                                <div class="text-red-500 text-lg mt-1 text-center">$20.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <?php $this->view("includes/footer",$data);?>
   
</body>
</html>
