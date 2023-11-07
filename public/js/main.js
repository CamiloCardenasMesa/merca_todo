const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');
const closeIcon = document.getElementById('nav-close');

let isMenuOpen = false;

const toggleMenu = () => {
    if (isMenuOpen) {
        navMenu.classList.add('hidden');
        closeIcon.classList.add('hidden');
        hamburger.classList.remove('hidden');
    } else {
        navMenu.classList.remove('hidden');
        closeIcon.classList.remove('hidden');
        hamburger.classList.add('hidden');
    }
    isMenuOpen = !isMenuOpen;
};

closeIcon.classList.add('hidden');

closeIcon.addEventListener('click', toggleMenu);
hamburger.addEventListener('click', toggleMenu);
