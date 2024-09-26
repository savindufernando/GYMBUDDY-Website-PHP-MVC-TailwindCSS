<script src="https://cdn.tailwindcss.com"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Admin Header -->
    <header class="bg-white shadow-md fixed w-full top-0 left-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            
            <!-- Logo Section -->
            <div class="flex items-center space-x-3">
                <img src="/SSP-GYMBUDDY/public/images/logo2.png" alt="GymBuddy Logo" class="w-32">
            </div>

            <!-- Right User Section -->
            <div class="flex items-center space-x-6">
                
                <!-- Profile Icon -->
                <a href="#" class="text-gray-700 hover:text-black">
                    <ion-icon name="person" class="text-2xl"></ion-icon>
                </a>

                <!-- Notifications Icon -->
                <a href="#" class="text-gray-700 hover:text-black relative">
                    <ion-icon name="notifications" class="text-2xl"></ion-icon>
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-500 rounded-full"></span>
                </a>

                <!-- Logout Button -->
                <a href="logout" class="text-red-500 hover:text-red-700 font-medium">Logout</a>
            </div>

            <!-- Mobile Menu Button (visible on small screens) -->
            <label for="sidebar-toggle" class="text-3xl md:hidden cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </label>

            <input type="checkbox" id="sidebar-toggle" class="hidden" />
        </div>
    </header>