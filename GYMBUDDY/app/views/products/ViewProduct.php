<?php $this->view("includes/adminheader", $data); ?>
<?php $this->view("includes/adminsidebar", $data); ?>

<br><br>
<!-- Main Content -->
<div class="md:ml-64 p-5 md:p-10 bg-gray-50 min-h-screen">
    <h1 class="text-3xl font-bold mb-6 flex items-center space-x-2 justify-center text-indigo-700">
        <ion-icon name="add-circle" class="text-3xl"></ion-icon>
        <span>VIEW PRODUCTS AND SERVICES</span>
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Product List -->
        <?php foreach($data['products'] as $product): ?>
        <div class="relative bg-white p-4 md:p-6 shadow-md rounded-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <img src="<?php echo $product->product_image_1; ?>" alt="product image" class="w-full h-40 object-cover rounded-t-lg">
            <h3 class="mt-4 text-xl font-semibold text-center text-gray-800"><?php echo $product->product_name; ?></h3>
            <div class="flex justify-between mt-3 text-lg text-gray-600">
                <p><strong>Price:</strong> <?php echo $product->product_price; ?> Rs.</p>
            </div>
            <div class="mt-2 text-sm text-gray-500">
                <p><strong>Category:</strong> <?php echo $product->product_category; ?></p>
            </div>
            <div class="flex justify-between mt-6">
                <a href="?edit=<?php echo $product->id; ?>" class="px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition ease-in-out duration-200">Edit</a>

                <!-- Delete Form -->
                <form method="POST" action="<?php echo BASE_URL . '/deleteproduct'; ?>">
                    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                    <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this product?');" 
                    class="px-4 py-2 font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition ease-in-out duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Edit Product Modal -->
    <?php
    if (isset($_GET['edit'])) {
        $productId = $_GET['edit'];

        // Fetch product details from the database using the product ID
        $product = $this->model('ProductModel')->getProductById($productId);

        if ($product): ?>
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow-lg mx-auto">
            <h3 class="text-lg font-semibold text-center text-gray-700 mb-3">Edit Product</h3>

            <form method="POST" action="<?php echo BASE_URL . '/updateproduct'; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">

                <div class="space-y-3">
                    <div>
                        <label for="editProductName" class="block font-medium text-gray-600 text-sm">Product Name</label>
                        <input type="text" name="product_name" id="editProductName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $product->product_name; ?>" required>
                    </div>

                    <div>
                        <label for="editProductCategory" class="block font-medium text-gray-600 text-sm">Product Category</label>
                        <select name="product_category" id="editProductCategory" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">Select Category</option>
                            <option value="Glutamin" <?php if ($product->product_category == 'Glutamin') echo 'selected'; ?>>Glutamin</option>
                            <option value="Women" <?php if ($product->product_category == 'Women') echo 'selected'; ?>>Women</option>
                            <option value="Creatine" <?php if ($product->product_category == 'Creatine') echo 'selected'; ?>>Creatine</option>
                            <option value="EnergyDrinks" <?php if ($product->product_category == 'EnergyDrinks') echo 'selected'; ?>>Energy Drinks</option>
                            <option value="MassGainers" <?php if ($product->product_category == 'MassGainers') echo 'selected'; ?>>Mass Gainers</option>
                            <option value="FatBurners" <?php if ($product->product_category == 'FatBurners') echo 'selected'; ?>>Fat Burners</option>
                            <option value="Testosterone" <?php if ($product->product_category == 'Testosterone') echo 'selected'; ?>>Testosterone</option>
                            <option value="ProteinBars" <?php if ($product->product_category == 'ProteinBars') echo 'selected'; ?>>Protein Bars</option>
                        </select>
                    </div>

                    <div>
                        <label for="editProductBrand" class="block font-medium text-gray-600 text-sm">Brand</label>
                        <input type="text" name="product_brand" id="editProductBrand" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $product->product_brand; ?>" required>
                    </div>
                    <div>
                        <label for="editProductPrice" class="block font-medium text-gray-600 text-sm">Price</label>
                        <input type="number" name="product_price" id="editProductPrice" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $product->product_price; ?>" required>
                    </div>

                    <div>
                        <label for="editProductStock" class="block font-medium text-gray-600 text-sm">Stock</label>
                        <input type="text" name="product_stock" id="editProductStock" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $product->product_stock; ?>" required>
                    </div>

                    <div>
                        <label for="editProductDescription" class="block font-medium text-gray-600 text-sm">Product Description</label>
                        <textarea name="product_description" id="editProductDescription" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required><?php echo $product->product_description; ?></textarea>
                    </div>

                    <div>
                        <label for="editProduct_image_1" class="block font-medium text-gray-600 text-sm">Product Image</label>
                        <input type="file" name="product_image_1" id="editProduct_image_1" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <img src="<?php echo $product->product_image_1; ?>" alt="Current image" class="mt-2 h-16 object-cover rounded-lg">
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="?" class="px-2 py-1 text-xs font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-2 focus:ring-gray-400">Cancel</a>
                        <button type="submit" class="px-2 py-1 text-xs font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php else: ?>
        <p class="text-center text-red-500">Product not found.</p>
    <?php endif; } ?>
