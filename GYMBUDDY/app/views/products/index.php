<!-- /app/views/products/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Buddy - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-100">
    <!-- Header -->
    <?php $this->view("includes/header", $data); ?>

    <!-- Banner -->
    <section class="relative bg-black">
        <img src="https://via.placeholder.com/1920x400" alt="Gym Banner" class="w-full h-80 object-cover opacity-50">
        <div class="absolute inset-0 flex justify-center items-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white">GYM BUDDY PRODUCTS</h1>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12 flex space-x-8">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-xl font-bold text-red-600 mb-4">Categories</h2>
            <ul class="space-y-2">
                <li><a href="glutamin" class="text-gray-600 hover:text-red-600">Glutamin and Amino</a></li>
                <li><a href="creatine" class="text-gray-600 hover:text-red-600">Creatine</a></li>
                <li><a href="vitamin" class="text-gray-600 hover:text-red-600">Vitamin</a></li>
                <li><a href="energy" class="text-gray-600 hover:text-red-600">Energy Drinks</a></li>
                <li><a href="mass" class="text-gray-600 hover:text-red-600">Mass Gainers</a></li>
                <li><a href="fat" class="text-gray-600 hover:text-red-600">Fat Burners</a></li>
                <li><a href="test" class="text-gray-600 hover:text-red-600">Testosterone Boosters</a></li>
                <li><a href="protein" class="text-gray-600 hover:text-red-600">Protein Bars & Health Food</a></li>
            </ul>
        </aside>  
    </main>

    <!-- Footer -->
    <?php $this->view("includes/footer", $data); ?>

    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@6.0.3/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>
