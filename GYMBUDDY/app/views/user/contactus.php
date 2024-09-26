<?php $this->view("includes/header", $data); ?>

<br>
<br>

<!-- Contact Section -->
<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold text-center mb-10">Contact Us</h2>
    <p class="text-center mb-12">We would love to hear from you. Whether you have a question about our services, need assistance, or have feedback, we are here to help.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Contact Information -->
        <div class="space-y-6">
            <!-- Location -->
            <div class="flex items-center space-x-2">
                <ion-icon name="location-outline" aria-hidden="true" class="text-orange text-lg item-orange" style="color: orange;"></ion-icon>
                <p class="text-gray-600">Havelock Mall, Kirulapone, Colombo 05, Sri Lanka</p>
            </div>

            <!-- Phone -->
            <div class="flex items-center space-x-2">
                <ion-icon name="call-outline" aria-hidden="true" class="text-orange text-lg" style="color: orange;"></ion-icon>
                <p class="text-gray-600">+94 11 23 45 678</p>
            </div>

            <!-- Email -->
            <div class="flex items-center space-x-2">
                <ion-icon name="mail-outline" aria-hidden="true" class="text-orange text-lg" style="color: orange;"></ion-icon>
                <a href="mailto:gymbuddy@help.com" class="text-gray-600">gymbuddy@help.com</a>
            </div>
            <div class="mt-6">
                <h4 class="text-lg font-bold">Find Us</h4>
                <!-- Map Embed -->
                <iframe class="w-full h-64" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31623.28556378984!2d79.84741205000001!3d6.927079700000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259fbc115888d%3A0x60e85b4b5b3a3b2e!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2s!4v1694695652394!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- Contact Form -->
        <div>
            <h3 class="text-xl font-bold mb-4">Get in Touch</h3>
            <form action="contact" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600" placeholder="Your Name" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600" placeholder="Your Email" required>
                </div>
                <div>
                    <label for="subject" class="block text-gray-700">Subject</label>
                    <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600" placeholder="Subject" required>
                </div>
                <div>
                    <label for="message" class="block text-gray-700">Message</label>
                    <textarea name="message" id="message" rows="2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Send Message</button>
                
                 <!-- Display success or error message -->
                 <?php if (isset($_GET['status'])): ?>
                    <p class="mt-4 text-center <?php echo $_GET['status'] === 'success' ? 'text-green-600' : 'text-red-600'; ?>">
                        <?php echo htmlspecialchars($_GET['message']); ?>
                    </p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

<?php $this->view("includes/footer", $data); ?>

</body>
</html>
