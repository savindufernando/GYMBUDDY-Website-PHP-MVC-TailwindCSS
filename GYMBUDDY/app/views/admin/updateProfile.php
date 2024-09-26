<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <?php $this->view("includes/adminheader", $data); ?>
</head>

<br><br><br>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Update Profile</h1>

        <!-- Error or success messages -->
        <?php if (isset($error_message)): ?>
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($errors) && !empty($errors)): ?>
        <div class="mb-4 p-4 bg-yellow-100 border border-yellow-300 text-yellow-700 rounded">
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php $this->view("includes/adminsidebar", $data); ?>

        <form action="update" method="POST" class="space-y-6">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($_SESSION['name']); ?>" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    required>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['email']); ?>" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                    required>
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">New Password (optional)</label>
                <input type="password" id="password" name="password" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="cpassword" class="block text-sm font-medium text-gray-700">Confirm New Password (optional)</label>
                <input type="password" id="cpassword" name="cpassword" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button type="submit" name="submit" 
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Update
                </button>
                <a href="<?php echo htmlspecialchars(BASE_URL . '/dashboard'); ?>" 
                    class="text-indigo-600 hover:text-indigo-700 text-sm">Back to Home</a>
            </div>
        </form>
    </div>
</body>
</html>
