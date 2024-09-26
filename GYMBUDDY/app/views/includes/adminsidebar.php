<script src="https://cdn.tailwindcss.com"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Sidebar -->
    <aside class="bg-gray-100 w-64 h-screen fixed left-0 top-0 pt-20 transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-40">
        <nav class="px-4">
            <br><br>
            <ul class="space-y-4">
                <!-- Dashboard Link -->
                <li>
                    <a href="dashboard" class="flex items-center space-x-3 text-gray-700 hover:text-black py-2">
                        <ion-icon name="home" class="text-2xl"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Add Products Link -->
                <li>
                    <a href="addproduct" class="flex items-center space-x-3 text-gray-700 hover:text-black py-2">
                        <ion-icon name="add-circle" class="text-2xl"></ion-icon>
                        <span>Add Products</span>
                    </a>
                </li>

                <!-- Add Services Link -->
                <li>
                    <a href="adds" class="flex items-center space-x-3 text-gray-700 hover:text-black py-2">
                        <ion-icon name="add-circle" class="text-2xl"></ion-icon>
                        <span>Add Services</span>
                    </a>
                </li>

                <!-- View Products Link -->
                <li>
                    <a href="viewproduct" class="flex items-center space-x-3 text-gray-700 hover:text-black py-2">
                        <ion-icon name="eye" class="text-2xl"></ion-icon>
                        <span>View Products</span>
                    </a>
                </li>

                <!-- View Services Link -->
                <li>
                    <a href="viewservice" class="flex items-center space-x-3 text-gray-700 hover:text-black py-2">
                        <ion-icon name="eye" class="text-2xl"></ion-icon>
                        <span>View Services</span>
                    </a>
                </li>

                <!-- Accounts Link -->
                <li>
                    <a href="accounts" class="flex items-center space-x-3 text-gray-700 hover:text-black py-2">
                        <ion-icon name="person" class="text-2xl"></ion-icon>
                        <span>Accounts</span>
                    </a>
                </li>
            </ul>
        </nav>
        <br><br><br><br><br><br>
        <!-- Settings Link -->
        <div class="px-4 py-4">
            <a href="#" class="flex items-center space-x-3 text-gray-700 hover:text-black">
                <ion-icon name="settings" class="text-2xl"></ion-icon>
                <span>Settings</span>
            </a>
        </div>
    </aside>

    <!-- Sidebar Toggle Button (visible on small screens) -->
    <label for="sidebar-toggle" class="text-3xl md:hidden fixed top-5 left-5 z-50 cursor-pointer">
        <ion-icon name="menu" class="text-2xl"></ion-icon>
    </label>

    <input type="checkbox" id="sidebar-toggle" class="hidden" />
