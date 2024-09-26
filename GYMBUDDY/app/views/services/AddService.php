<?php $this->view("includes/adminheader", $data); ?>
<?php $this->view("includes/adminsidebar", $data); ?>
<br><br>

<div class="flex items-center justify-center flex-1 ml-64">
    <div class="w-full max-w-4xl p-8 bg-gray-100">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Add Service</h2>
        <div class="flex justify-center mt-1 mb-6">
            <div class="w-20 h-1 bg-red-500"></div>
        </div>

        <form action="addservice" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-2 gap-6">
                <!-- Service Name -->
                <div>
                    <label for="serviceName" class="block mb-2 font-medium text-gray-700">Service Name</label>
                    <input type="text" name="service_name" id="serviceName" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                </div>

                <!-- Service Category -->
                <div>
                    <label for="serviceCategory" class="block mb-2 font-medium text-gray-700">Service Category</label>
                    <select name="service_category" id="serviceCategory" class="w-full px-4 py-2 text-sm font-medium border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                        <option value="">Select Category</option>
                        <option value="MuscleGainCoaching">Muscle Gain Coaching</option>
                        <option value="WeighLossCoaching">Weigh Loss Coaching</option>
                        <option value="CompetitionBodybuilding">Competition Level Bodybuilding Coaching</option>
                        <option value="CalisthenicsCoaching">Calisthenics Coaching</option>
                        <option value="Wrestling">Wrestling</option>
                        <option value="Swimming">Swimming</option>
                        <option value="MMA">MMA</option>
                        <option value="Boxing">Boxing</option>
                        <option value="Physiotherapy">Physiotherapy</option>
                    </select>
                </div>

                <!-- Service Price -->
                <div>
                    <label for="servicePrice" class="block mb-2 font-medium text-gray-700">Service Price</label>
                    <input type="text" name="service_price" id="servicePrice" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                </div>

                <!-- Service Brand -->
                <div>
                    <label for="serviceBrand" class="block mb-2 font-medium text-gray-700">Trainer's Name</label>
                    <input type="text" name="service_brand" id="serviceBrand" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                </div>
            </div>

            <!-- Service Description -->
            <div>
                <label for="serviceDescription" class="block mb-2 font-medium text-gray-700">Service Description</label>
                <textarea name="service_description" id="serviceDescription" rows="5" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500"></textarea>
            </div>

            <!-- Service Image -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="service_image" class="block mb-2 font-medium text-gray-700">Service Image</label>
                    <input type="file" name="service_image" id="service_image" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500">
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" name="submit" class="w-full py-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Add Service</button>
            </div>
        </form>
    </div>
</div>

<?php $this->view("includes/adminfooter", $data); ?>
