<!DOCTYPE html>
<html lang="en">


<body id="top" class="font-roboto">

<?php $this->view("includes/header", $data); ?>
<br>
<br>

  <!-- Main Section -->
  <main class="container mx-auto mt-12">
    <section class="about-us flex flex-col lg:flex-row items-center justify-between">
      <div class="w-full lg:w-1/2">
        <img src="/GYMBUDDY/public/images/aboutus.png" alt="Health and Wellness" class="rounded-lg shadow-lg">
      </div>
      <div class="w-full lg:w-1/2 mt-8 lg:mt-0 px-6">
        <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
        <p class="text-gray-600 mb-6">At Health & Wellness Shop, our mission is to empower you to achieve your best self through top-quality supplements and personalized training. We believe in a holistic approach to health that includes proper nutrition, physical activity, and mental well-being.</p>
        <h2 class="text-3xl font-bold mb-4">What We Offer</h2>
        <p class="text-gray-600 mb-6">We provide a range of high-quality supplements designed to support various aspects of health...</p>
        <h2 class="text-3xl font-bold mb-4">Join Us</h2>
        <p class="text-gray-600 mb-6">Join our community and take the first step towards a healthier, happier you.</p>
        <a href="contact-us.html" class="bg-red-400 text-white py-3 px-4 rounded-r-lg focus:outline-none">Contact Us</a>
      </div>
    </section>
    
    <!-- Team Section -->
    <section class="mt-16">
      <h2 class="text-3xl font-bold text-center mb-8">Meet Our CEO and Team</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gray-100 p-6 rounded-lg shadow">
          <h3 class="text-2xl font-semibold mb-4">Savindu Fernando - CEO</h3>
          <p class="text-gray-600">Savindu Fernando is the visionary behind Health & Wellness Shop. With over 5 years of experience...</p>
        </div>
        <div class="bg-gray-100 p-6 rounded-lg shadow">
          <h3 class="text-2xl font-semibold mb-4">Hirusha Gamage - Head Nutritionist</h3>
          <p class="text-gray-600">Hirusha Gamage is our head nutritionist with a wealth of knowledge...</p>
        </div>
        <div class="bg-gray-100 p-6 rounded-lg shadow">
          <h3 class="text-2xl font-semibold mb-4">Pavithra Dissanayake - Lead Trainer</h3>
          <p class="text-gray-600">Pavithra Dissanayake brings a dynamic approach to personal training...</p>
        </div>
      </div>
    </section>
</main>

  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<br>
<br>

</html>
<?php $this->view("includes/footer", $data); ?>