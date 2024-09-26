<!DOCTYPE html>
<html lang="en">
<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <?php $this->view("includes/header", $data); ?>

    <!-- Main Content -->
    <main class="mt-12">
        <!-- Banner Section -->
        <section class="relative">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-white text-4xl font-bold uppercase">Achieve Your Fitness Goals</h1>
            </div>
        </section>

        <!-- Filter Section -->
        <div class="container mx-auto px-6 py-8 bg-red-500">
            <br>
            <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center uppercase tracking-wider">
                <?php echo htmlspecialchars($data['page_title']); ?>
            </h2>

            <!-- Category Filter Form -->
            <form method="GET" class="flex justify-center mb-8">
                <select name="category" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-4 py-2 bg-white shadow-lg focus:ring focus:ring-blue-300 transition duration-200">
                    <option value="all">All Categories</option>
                    <?php foreach ($data['servicesByCategory'] as $category => $services): ?>
                        <option value="<?php echo htmlspecialchars($category); ?>" <?php echo (isset($_GET['category']) && $_GET['category'] === $category) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>

        <!-- Product Section -->
        <div class="container mx-auto px-6 py-0">
            <!-- Product Grid -->
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 lg:grid-cols-4">
                <?php
                // Get the selected category from the form submission
                $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';

                // Loop through each category and its services
                foreach ($data['servicesByCategory'] as $category => $services):
                    // If a category is selected, show only that category's services
                    if ($selectedCategory !== 'all' && $selectedCategory !== $category) {
                        continue;
                    }
                ?>
                    <h3 class="text-xl font-semibold mt-6 mb-2 col-span-full text-gray-700 border-b pb-2">
                        <?php echo htmlspecialchars($category); ?>
                    </h3>
                    <?php foreach ($services as $service): ?>
                        <!-- Product Card -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group hover:shadow-2xl transition-all transform hover:-translate-y-2">
                            <figure class="relative">
                                <img src="<?php echo htmlspecialchars($service->service_image); ?>" alt="<?php echo htmlspecialchars($service->service_name); ?>" class="w-full h-64 object-cover">
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
                                <h3 class="text-lg font-bold text-center"><?php echo htmlspecialchars($service->service_name); ?></h3>
                                <p class="text-gray-600 text-center">Price: $<?php echo htmlspecialchars($service->service_price); ?></p>
                                <p class="text-gray-600 text-center">Brand: <?php echo htmlspecialchars($service->service_brand); ?></p>
                                <p class="text-gray-500 text-center"><?php echo htmlspecialchars($service->service_description); ?></p>
                            </div>
                        </div>
                        <!-- End Product Card -->
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php $this->view("includes/footer", $data); ?>
</body>

</html>
