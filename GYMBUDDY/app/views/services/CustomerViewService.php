<?php $this->view("includes/header", $data); ?>
<br>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold text-center text-gray-800">Our Services</h1>
    
    <?php if (!empty($services)): ?>
        <?php 
        // Group services by category
        $groupedServices = [];
        foreach ($services as $service) {
            $groupedServices[$service->service_category][] = $service;
        }
        ?>

        <?php foreach ($groupedServices as $category => $services): ?>
            <h2 class="text-2xl font-semibold text-gray-700 mt-8"><?php echo htmlspecialchars($category); ?></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
                <?php foreach ($services as $service): ?>
                    <div class="bg-white p-4 border border-gray-200 rounded-lg shadow-md">
                        <img src="<?php echo htmlspecialchars($service->service_image); ?>" alt="<?php echo htmlspecialchars($service->service_name); ?>" class="w-full h-40 object-cover rounded-md mb-4">
                        <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($service->service_name); ?></h3>
                        <p class="text-gray-600 mb-2"><?php echo htmlspecialchars($service->service_description); ?></p>
                        <p class="text-gray-800 font-semibold">Price: $<?php echo htmlspecialchars($service->service_price); ?></p>
                        <p class="text-gray-600">Trainer: <?php echo htmlspecialchars($service->service_brand); ?></p>
                        <div class="mt-4">
                            <a href="service-details.php?id=<?php echo $service->id; ?>" class="text-red-500 hover:underline">View Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-gray-600 text-center">No services available at the moment.</p>
    <?php endif; ?>
</div>

<?php $this->view("includes/footer", $data); ?>
