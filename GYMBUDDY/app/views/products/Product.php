<?php $this->view("includes/header", $data); ?>

<section class="pl-2 pt-6">
    <button onclick="window.history.back()" class="flex items-center space-x-2 text-lg font-medium text-gray-800 hover:text-black transition">
        <i class="fa-solid fa-angle-left"></i>
        <span>Back</span>
    </button>
</section>

<?php $product = $data['product']; ?>

<section class="bg-white py-8">
    <div class="max-w-screen-xl px-4 mx-auto md:px-8">
        <div class="grid gap-8 md:grid-cols-2">
            <!-- Product Image -->
            <div class="relative overflow-hidden bg-gray-100 rounded-lg">
                <img src="<?php echo $product->product_image_1; ?>" loading="lazy" alt="Product Image" class="object-cover object-center w-full h-auto rounded-lg" />
            </div>

            <!-- Product Details -->
            <div class="md:py-8">
                <!-- Product Title and Price -->
                <h1 class="mb-2 text-3xl font-bold text-gray-800 md:text-4xl"><?php echo $product->product_name; ?></h1>
                <p class="mt-4 mb-6 text-2xl font-semibold text-red-600">Rs. <?php echo number_format($product->product_price, 2); ?></p>

                <!-- Add to Cart and Quantity -->
                <div class="flex items-center mb-6 space-x-4">
                    <input type="number" name="quantity" value="1" min="1" class="border border-gray-300 rounded-md w-16 text-center focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button class="flex items-center justify-center px-6 py-3 space-x-2 font-medium text-white bg-orange-500 rounded-lg shadow-lg hover:bg-orange-600 transition focus:outline-none">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span>Add to cart</span>
                    </button>
                </div>

                <!-- Notice Section -->
                <div class="mt-4 bg-gray-100 p-4 rounded-lg">
                    <p class="text-gray-700 text-sm">
                        We deliver. Check out using Multiple Payment Options or Cash On Delivery at your convenience. We will ship your order to your doorstep, no matter which part of the Island you are in. <br>
                        Please Note: Cash On Delivery orders may take longer to deliver based on location and courier service.
                    </p>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="mt-8">
            <h2 class="mb-2 text-lg font-semibold text-gray-800">Description</h2>
            <p class="text-gray-700 leading-relaxed"><?php echo $product->product_description; ?></p>
        </div>

        <!-- Related Products Section -->
        <div class="mt-12">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Related Products</h2>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                <div class="relative bg-white p-4 rounded-lg shadow">
                    <img src="related_product_image_url" alt="Related Product" class="object-cover w-full h-40 rounded-md" />
                    <h3 class="mt-4 text-sm font-medium text-gray-900">Product Name</h3>
                    <p class="mt-2 text-sm font-semibold text-red-600">Rs 1,000.00</p>
                </div>
                <!-- Repeat related products structure here -->
            </div>
        </div>
    </div>
</section>

<?php $this->view("includes/footer", $data); ?>
