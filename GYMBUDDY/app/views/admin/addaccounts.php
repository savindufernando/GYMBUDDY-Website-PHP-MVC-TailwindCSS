<?php $this->view("includes/adminheader", $data); ?>
<?php $this->view("includes/adminsidebar", $data); ?>
<br><br>

<div class="flex items-center justify-center flex-1 ml-64">
    <div class="w-full max-w-4xl p-8 bg-gray-100">
        <h1 class="text-3xl font-bold mb-6 flex items-center space-x-2 justify-center text-indigo-700">
            <ion-icon name="add-circle" class="text-3xl"></ion-icon>
            <span>Add Accounts</span>
        </h1>
        <form action="addaccounts" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block mb-2 font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 font-medium text-gray-700">email</label>
                    <input type="text" name="email" id="email" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 font-medium text-gray-700">password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                </div>
                <div>
                    <label for="cpassword" class="block mb-2 font-medium text-gray-700">passwordagin</label>
                    <input type="password" name="cpassword" id="email" class="w-full px-4 py-2 text-sm border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                </div>
                <div>
                    <label for="role" class="block mb-2 font-medium text-gray-700">Role</label>
                    <select name="role" id="productCategory" class="w-full px-4 py-2 text-sm font-medium border border-gray-400 rounded-md focus:outline-none focus:border-red-500" required>
                        <option value="">Select Category</option>
                        <option value="admin" selected>Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" name="submit" class="w-full py-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Add Product</button>
            </div>
        </form>
    </div>
</div>

<?php $this->view("includes/adminfooter", $data); ?>