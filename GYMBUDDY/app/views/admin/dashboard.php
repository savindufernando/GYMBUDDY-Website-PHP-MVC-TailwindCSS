<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php $this->view("includes/adminheader", $data); ?>

    <div class="flex flex-col md:flex-row pt-20 min-h-screen">
        <div class="md:ml-64 p-4 md:p-6 bg-gray-50 flex-1">
            <div class="flex">
                <?php $this->view("includes/adminsidebar", $data); ?>
                <!-- Main Content -->
                <main class="flex-1 p-6">
                    <!-- Header -->
                    <div class="bg-white p-6 shadow-lg flex items-center justify-between">
                        <h1 class="text-2xl font-bold flex items-center">
                            <i class="icon-dashboard mr-2"></i>DASHBOARD
                        </h1>
                        <div class="flex items-center space-x-4">
                            <a href="#" class="text-gray-700"><i class="icon-user"></i></a>
                        </div>
                    </div>

                    <!-- Dashboard Cards -->
                    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Welcome Card -->
                        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
                            <h3 class="text-lg font-semibold">Welcome!</h3>
                            <p class="mt-2 text-red-600"><?= htmlspecialchars($_SESSION['name']); ?></p>
                            <a href="updateProfile"><button class="mt-4 bg-orange-500 text-white px-4 py-2 rounded">Update Profile</button></a>
                        </div>

                        <!-- Unread Messages Card -->
                        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
                            <h3 class="text-lg font-semibold">Unread Messages</h3>
                            <p class="mt-2 text-gray-600"><?php echo isset($data['messageCount']) ? $data['messageCount'] : 'N/A'; ?></p>
                            <button class="mt-4 bg-orange-500 text-white px-4 py-2 rounded">See Messages</button>
                        </div>

                        <!-- Products Added Card -->
                        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
                            <h3 class="text-lg font-semibold">Products Added</h3>
                            <p class="mt-2 text-gray-600"><?php echo isset($data['productCount']) ? $data['productCount'] : 'N/A'; ?></p>
                            <button class="mt-4 bg-orange-500 text-white px-4 py-2 rounded">Add Products</button>
                        </div>

                        <!-- Service Added Card -->
                        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
                            <h3 class="text-lg font-semibold">Services Added</h3>
                            <p class="mt-2 text-gray-600">
                                <?php echo isset($data['serviceCount']) ? $data['serviceCount'] : 'N/A'; ?>
                            </p>
                            <button class="mt-4 bg-orange-500 text-white px-4 py-2 rounded">Add Services</button>
                        </div>




                        <!-- User Accounts Card -->
                        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
                            <h3 class="text-lg font-semibold">User Accounts</h3>
                            <p class="mt-2 text-gray-600"><?= htmlspecialchars($data['userCount'] ?? 'N/A') ?></p>
                            <a href="accounts"><button class="mt-4 bg-orange-500 text-white px-4 py-2 rounded">See Accounts</button></a>
                        </div>

                        <!-- Admin Accounts Card -->
                        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
                            <h3 class="text-lg font-semibold">Admin Accounts</h3>
                            <p class="mt-2 text-gray-600"><?php echo isset($data['adminCount']) ? $data['adminCount'] : 'N/A'; ?></p>
                            <button class="mt-4 bg-orange-500 text-white px-4 py-2 rounded">See Accounts</button>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php $this->view("includes/adminfooter", $data); ?>
</body>
</html>
