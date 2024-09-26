

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="/GYMBUDDY/public/style.css">

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="flex justify-center mb-4">
            <img src="/GYMBUDDY/public/images/logo2.png" alt="Gym Buddy" class="w-40 h-auto">
        </div>
        <!-- form -->
                <?php if (!empty($data['error_message'])): ?>
                    <div class="error-message" style="color: red;">
                        <?= $data['error_message']; ?>
                    </div>
                <?php endif; ?>
                <form action="register" method="POST"> 
                    <div class="mb-2">
                        <input id="name" type="text" name="name" placeholder="Name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        
                    </div>
                    <div class="mb-2">
                        <input id="email" type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        
                    </div>
                    <div class="mb-2">
                        <input id="password" type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        
                    </div>
                    <div class="mb-2">
                        <input id="cpassword" type="password" name="cpassword" placeholder="Re-Password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <button type="submit" name="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-md transition duration-300">Sign Up</button>
                </form>            
        <!-- end -->

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