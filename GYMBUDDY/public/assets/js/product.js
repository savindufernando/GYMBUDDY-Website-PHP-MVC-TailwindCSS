//// Home page

// mobile menu
const menuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

menuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

// user dropdown
document.getElementById('dropdown-button').addEventListener('click', function () {
    const menu = document.getElementById('dropdown-menu');
    const expanded = this.getAttribute('aria-expanded') === 'true';
    menu.classList.toggle('hidden');
    this.setAttribute('aria-expanded', !expanded);
});

// image functionality
const thumbnails = document.querySelectorAll('.thumbnail');
const mainImage = document.getElementById('mainImage');

thumbnails.forEach(thumbnail => {
 thumbnail.addEventListener('click', () => {
     const newSrc = thumbnail.src.replace('100', '600x700'); 
     mainImage.src = newSrc;
 });
});


// Size functionality
const sizeOptions = document.querySelectorAll('.size-option');
sizeOptions.forEach(option => {
 option.addEventListener('click', () => {
     sizeOptions.forEach(btn => btn.classList.remove('selected'));
     option.classList.add('selected');
 });
});


// Color functionality
const colorOptions = document.querySelectorAll('.color-option');
colorOptions.forEach(option => {
 option.addEventListener('click', () => {
     colorOptions.forEach(btn => btn.classList.remove('selected'));
     option.classList.add('selected');
 });
});


// Quantity functionality
const decrementButton = document.getElementById('decrement');
const incrementButton = document.getElementById('increment');
const quantityDisplay = document.getElementById('quantity');
let quantity = 1;

decrementButton.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
    }
});

incrementButton.addEventListener('click', () => {
    quantity++;
    quantityDisplay.textContent = quantity;
});


//product details
const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.content');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        
        tabs.forEach(t => t.classList.remove('border-black-500', 'text-black-900'));
        contents.forEach(c => c.classList.add('hidden'));

        tab.classList.add('border-black-500', 'text-black-900');
        contents[index].classList.remove('hidden');
    });
});











    





