<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Buddy - Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <?php $this->view("includes/header", $data); ?>

    <!-- Main Content -->
    <main class="ml-64 mt-12">
        <!-- Banner -->
        <section class="relative">
            <img src="/SSP-GYMBUDDY/public/images/GYM-PRODUCT.png" alt="Gym Banner" class="w-full h-64 object-cover">
        </section>
        
        <!-- Sidebar -->
        <?php $this->view("includes/sidebar", $data); ?>

        <!-- Product Section -->
        <div class="container mx-auto px-6 py-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center uppercase tracking-wide">
                <?php echo $data['page_title']; ?>
            </h2>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 lg:grid-cols-4">
                <?php if (empty($data['products'])): ?>
                    <div class="text-center text-gray-500 col-span-full">
                        <p>No result</p>
                    </div>
                <?php else: ?>
                    <?php foreach($data['products'] as $product): ?>
                        <!-- Product Card -->
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden relative group hover:shadow-2xl transition-all transform hover:-translate-y-2">
                            <figure class="relative">
                                <img src="<?php echo $product->product_image_1; ?>" alt="<?php echo $product->product_name; ?>" class="w-full h-64 object-cover">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                    <div class="flex space-x-4">
                                    <a href="<?php echo BASE_URL; ?>/addToCart" class="text-white bg-red-500 p-2 rounded-full hover:bg-red-400 hover:shadow-lg transition duration-300">
                                        <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                    </a>
                                        <button class="text-white bg-green-500 p-2 rounded-full hover:bg-green-400 hover:shadow-lg transition duration-300">
                                            <ion-icon name="heart-outline" class="text-xl"></ion-icon>
                                        </button>
                                        <a href="/SSP-GYMBUDDY/public/productPage?id=<?php echo $product->id; ?>">
                                            <button class="text-white bg-blue-500 p-2 rounded-full hover:bg-blue-400 hover:shadow-lg transition duration-300">
                                                <ion-icon name="eye-outline" class="text-xl"></ion-icon>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </figure>
                            <div class="p-4">
                                <h3 class="text-xl font-semibold mt-2 text-center"><?php echo $product->product_name; ?></h3>
                                <div class="text-red-500 text-lg mt-1 text-center">Rs <?php echo $product->product_price; ?></div>
                            </div>
                        </div>
                        <!-- End Product Card -->
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php $this->view("includes/footer", $data); ?>
</body>

</html>
