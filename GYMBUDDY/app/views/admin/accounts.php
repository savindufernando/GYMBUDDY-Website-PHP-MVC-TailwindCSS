<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <?php $this->view("includes/adminheader", $data); ?>
    <?php $this->view("includes/adminsidebar", $data); ?>
    <br><br>
    
    <!-- Main Content -->
    <div class="md:ml-64 p-5 md:p-10 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-bold mb-6 flex items-center space-x-2 justify-center text-indigo-700">
            <ion-icon name="people-circle" class="text-3xl"></ion-icon>
            <span>User Accounts</span>
        </h1>
        <a href="addacc" class="flex items-center space-x-3 text-gray-700 hover:text-black py-2">
            <ion-icon name="add-circle" class="text-2xl"></ion-icon>
            <span>Add Admin/User Accounts</span>
        </a>
        
        <!-- User Accounts Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-600 font-medium uppercase">ID</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-medium uppercase">Name</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-medium uppercase">Email</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-medium uppercase">Role</th>
                        <th class="py-3 px-4 text-left text-gray-600 font-medium uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['users'] as $user): ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-3 px-4 border-b"><?php echo $user->id; ?></td>
                            <td class="py-3 px-4 border-b"><?php echo $user->name; ?></td>
                            <td class="py-3 px-4 border-b"><?php echo $user->email; ?></td>
                            <td class="py-3 px-4 border-b"><?php echo $user->role; ?></td>
                            <td class="py-3 px-4 border-b flex space-x-2">
                                <a href="?edit=<?php echo $user->id; ?>" class="text-blue-600 hover:text-blue-700 font-semibold">Edit</a>
                                <form method="POST" action="<?php echo BASE_URL; ?>/deleteUser/<?php echo $user->id; ?>" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit User Modal -->
    <?php
    if (isset($_GET['edit'])) {
        $userId = $_GET['edit'];

        // Fetch user details from the database using the user ID
        $user = $this->model('AuthModel')->getUserById($userId);

        if ($user): ?>
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow-lg mx-auto">
            <h3 class="text-lg font-semibold text-center text-gray-700 mb-3">Edit User Account</h3>

            <form method="POST" action="<?php echo BASE_URL . '/updateUser'; ?>">
                <input type="hidden" name="id" value="<?php echo $user->id; ?>">

                <div class="space-y-3">
                    <div>
                        <label for="editUserName" class="block font-medium text-gray-600 text-sm">Name</label>
                        <input type="text" name="name" id="editUserName" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $user->name; ?>" required>
                    </div>

                    <div>
                        <label for="editUserEmail" class="block font-medium text-gray-600 text-sm">Email</label>
                        <input type="email" name="email" id="editUserEmail" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" value="<?php echo $user->email; ?>" required>
                    </div>

                    <div>
                        <label for="editUserRole" class="block font-medium text-gray-600 text-sm">Role</label>
                        <select name="role" id="editUserRole" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                            <option value="Admin" <?php if ($user->role == 'Admin') echo 'selected'; ?>>Admin</option>
                            <option value="User" <?php if ($user->role == 'User') echo 'selected'; ?>>User</option>
                        </select>
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
        <p class="text-center text-red-500">User not found.</p>
    <?php endif; } ?>

    <?php $this->view("includes/adminfooter", $data); ?>
</body>
</html>
