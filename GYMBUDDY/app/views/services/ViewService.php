<?php $this->view("includes/adminheader", $data); ?>
<?php $this->view("includes/adminsidebar", $data); ?>

<br><br>
<!-- Main Content -->
<div class="md:ml-64 p-5 md:p-10 bg-gray-50 min-h-screen">
    <h1 class="text-3xl font-bold mb-6 flex items-center space-x-2 justify-center text-indigo-700">
        <ion-icon name="add-circle" class="text-3xl"></ion-icon>
        <span>VIEW SERVICES</span>
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Service List -->
        <?php foreach($data['services'] as $service): ?>
        <div class="relative bg-white p-4 md:p-6 shadow-md rounded-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <img src="<?php echo $service->service_image; ?>" alt="service image" class="w-full h-40 object-cover rounded-t-lg">
            <h3 class="mt-4 text-xl font-semibold text-center text-gray-800"><?php echo $service->service_name; ?></h3>
            <div class="flex justify-between mt-3 text-lg text-gray-600">
                <p><strong>Price:</strong> <?php echo $service->service_price; ?> Rs.</p>
            </div>
            <div class="mt-2 text-sm text-gray-500">
                <p><strong>Category:</strong> <?php echo $service->service_category; ?></p>
            </div>
            <div class="flex justify-between mt-6">
                <a href="?edit=<?php echo $service->id; ?>" class="px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition ease-in-out duration-200">Edit</a>

                <!-- Delete Form -->
                <form method="POST" action="<?php echo BASE_URL . '/deleteservice'; ?>">
                    <input type="hidden" name="id" value="<?php echo $service->id; ?>">
                    <button type="submit" name="submit" onclick="return confirm('Are you sure you want to delete this service?');" 
                    class="px-4 py-2 font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition ease-in-out duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Edit Service Modal -->
    <?php
    if (isset($_GET['edit'])) {
        $serviceId = $_GET['edit'];

        // Fetch service details from the database using the service ID
        $service = $this->model('ServiceModel')->getServiceById($serviceId);

        if ($service): ?>
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow-lg mx-auto">
            <h3 class="text-lg font-semibold text-center text-gray-700 mb-3">Edit Service</h3>

            <form method="POST" action="<?php echo BASE_URL . '/updateservice'; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $service->id; ?>">

                <div class="space-y-3">
                    <div>
                        <label for="editServiceName" class="block font-medium text-gray-600 text-sm">Service Name</label>
                        <input type="text" name="service_name" id="editServiceName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $service->service_name; ?>" required>
                    </div>

                    <div>
                        <label for="editServiceCategory" class="block font-medium text-gray-600 text-sm">Service Category</label>
                        <select name="service_category" id="editServiceCategory" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                            <option value="">Select Category</option>
                            <option value="Category1" <?php if ($service->service_category == 'Category1') echo 'selected'; ?>>Category 1</option>
                            <option value="Category2" <?php if ($service->service_category == 'Category2') echo 'selected'; ?>>Category 2</option>
                            <option value="Category3" <?php if ($service->service_category == 'Category3') echo 'selected'; ?>>Category 3</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>

                    <div>
                        <label for="editServicePrice" class="block font-medium text-gray-600 text-sm">Price</label>
                        <input type="number" name="service_price" id="editServicePrice" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $service->service_price; ?>" required>
                    </div>

                    <div>
                        <label for="editServiceDescription" class="block font-medium text-gray-600 text-sm">Service Description</label>
                        <textarea name="service_description" id="editServiceDescription" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required><?php echo $service->service_description; ?></textarea>
                    </div>

                    <div>
                        <label for="editServiceImage" class="block font-medium text-gray-600 text-sm">Service Image</label>
                        <input type="file" name="service_image" id="editServiceImage" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <img src="<?php echo $service->service_image; ?>" alt="Current image" class="mt-2 h-16 object-cover rounded-lg">
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
        <p class="text-center text-red-500">Service not found.</p>
    <?php endif; } ?>
</div>

<?php $this->view("includes/adminfooter", $data); ?>
