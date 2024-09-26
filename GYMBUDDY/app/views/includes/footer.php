<!-- Tailwind Output CSS -->
<link rel="stylesheet" href="/SSP/public/output.css">

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- Footer Section -->
<footer class="bg-gray-200">
  <div class="bg-gray-100 py-12 border-b border-gray-300">
    <div class="container mx-auto px-4">
      <div class="mb-12 border-b border-gray-300 pb-12">
        <a href="#" class="flex justify-center items-center mb-6">
          <img src="/SSP/public/images/logo2.png" width="160" height="50" alt="gymbuddy" loading="lazy" class="logo mb-4">
        </a>
        <ul class="flex gap-2 justify-center">
          <li><a href="#" class="bg-gray-300 text-gray-800 text-xl p-3 rounded transition hover:bg-red-400 hover:text-white"><ion-icon name="logo-facebook"></ion-icon></a></li>
          <li><a href="#" class="bg-gray-300 text-gray-800 text-xl p-3 rounded transition hover:bg-red-400 hover:text-white"><ion-icon name="logo-twitter"></ion-icon></a></li>
          <li><a href="#" class="bg-gray-300 text-gray-800 text-xl p-3 rounded transition hover:bg-red-400 hover:text-white"><ion-icon name="logo-pinterest"></ion-icon></a></li>
          <li><a href="#" class="bg-gray-300 text-gray-800 text-xl p-3 rounded transition hover:bg-red-400 hover:text-white"><ion-icon name="logo-linkedin"></ion-icon></a></li>
        </ul>
      </div>

      <div class="flex flex-col md:flex-row justify-between text-center">
        <div class="mb-8 md:mb-0">
          <p class="text-lg font-bold text-gray-800 mb-6">Contact Us</p>
          <ul>
            <li class="flex items-center mb-3"><ion-icon name="location" class="mr-2 text-red-400"></ion-icon> Havelock Mall, Kirulapone, Colombo 05, Sri Lanka</li>
            <li class="flex items-center mb-3"><a href="tel:+94112345678" class="flex items-center text-gray-800 hover:text-red-400"><ion-icon name="call" class="mr-2 text-red-400"></ion-icon>+94 112 345 678</a></li>
            <li class="flex items-center"><a href="mailto:support@domain.com" class="flex items-center text-gray-800 hover:text-red-400"><ion-icon name="mail" class="mr-2 text-red-400"></ion-icon>support@domain.com</a></li>
          </ul>
        </div>
        <div class="mb-8 md:mb-0">
          <p class="text-lg font-bold text-gray-800 mb-6">Quick Links</p>
          <ul>
            <li><a href="#" class="text-gray-800 hover:text-red-400">About Us</a></li>
            <li><a href="#" class="text-gray-800 hover:text-red-400">Our Services</a></li>
            <li><a href="#" class="text-gray-800 hover:text-red-400">Our Products</a></li>
            <li><a href="#" class="text-gray-800 hover:text-red-400">Contact Us</a></li>
          </ul>
        </div>
        <div>
          <p class="text-lg font-bold text-gray-800 mb-6">Our Newsletter</p>
          <form class="flex">
            <input type="email" placeholder="Your email" class="w-full py-3 px-4 rounded-l-lg border-0 focus:outline-none">
            <button class="bg-red-400 text-white py-3 px-4 rounded-r-lg focus:outline-none"><ion-icon name="arrow-forward-outline"></ion-icon></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-4 text-center text-gray-700">
    <p class="container mx-auto px-4">© <?php echo date("Y"); ?> Gym Buddy - All Rights Reserved</p>
  </div>
</footer>

<!-- Scripts -->
<script src="/assets/js/product.js"></script>
<script>
  // Mobile Menu Toggle
  document.getElementById('menuButton').addEventListener('click', () => {
    document.getElementById('menu').classList.toggle('translate-x-full');
  });

  document.getElementById('closeButton').addEventListener('click', () => {
    document.getElementById('menu').classList.add('translate-x-full');
  });

  
// user dropdown
document.getElementById('dropdown-button').addEventListener('click', function () {
    const menu = document.getElementById('dropdown-menu');
    const expanded = this.getAttribute('aria-expanded') === 'true';
    menu.classList.toggle('hidden');
    this.setAttribute('aria-expanded', !expanded);
});

</script>
