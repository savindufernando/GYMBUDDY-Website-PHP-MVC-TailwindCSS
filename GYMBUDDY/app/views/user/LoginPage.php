

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="/GYMBUDDY/public/style.css">

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="flex justify-center mb-4">
            <img src="/GYMBUDDY/public/images/logo2.png" alt="Gym Buddy" class="w-40 h-auto">
        </div>

        <form method="post" action="log">
            <input type="hidden" name="type" value="login">

            <div class="mb-4">
                <input type="text" name="email" placeholder="Email..." 
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <input type="password" name="password" placeholder="Password..." 
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input id="show-password" type="checkbox" 
                        class="h-4 w-4 text-[#b1975b] focus:ring-[#b1975b] border-gray-300 rounded">
                    <label for="show-password" class="ml-2 text-sm text-gray-800">Show Password</label>
                </div>
            </div>

            <button type="submit" name="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-md transition duration-300">
                Log In
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="#" class="text-blue-600 hover:underline">Forgotten Account?</a>
        </div>
        <div class="text-center mt-4">
            <a href="/GYMBUDDY/app/view/user/signup.php" class="text-blue-600 hover:underline">Signup? Create New Account</a>
        </div>
        <div class="text-center mt-2">
            <a href="/SSP-GYMBUDDY/public/" class="text-black hover:underline">Go Back</a>
        </div>
    </div>
</body>
</html>